<?php

namespace App\Security;

use App\DTO\UserLoginAttempDTO;
use App\Entity\User;
use App\Services\RequestDataService;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

class LoginFormAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'app_login';

    private UrlGeneratorInterface $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function asyncAuthenticate(Request $request): Passport
    {
        $userData = RequestDataService::getRequestData($request, UserLoginAttempDTO::class);
        $request->getSession()->set(Security::LAST_USERNAME, $userData->getLogin());

        $test_badge = new Passport(
            new UserBadge($userData->getLogin()),
            new PasswordCredentials($userData->getPassword()),
            [
                new CsrfTokenBadge('authenticate', $userData->getCsrfToken()),
            ]
        );

        dd($test_badge->getUser());
        return new Passport(
            new UserBadge($userData->getLogin()),
            new PasswordCredentials($userData->getPassword()),
            [
                new CsrfTokenBadge('authenticate', $userData->getCsrfToken()),
            ]
        );
    }

    public function authenticate(Request $request): Passport
    {
        $username = $request->request->get('username', '');

        $request->getSession()->set(Security::LAST_USERNAME, $username);

        return new Passport(
            new UserBadge($username),
            new PasswordCredentials($request->request->get('password', '')),
            [
                new CsrfTokenBadge('authenticate', $request->request->get('_csrf_token')),
            ]
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            dd($targetPath);
            return new RedirectResponse($targetPath);
        }

//        echo "JEST USER!";
//        die;
        // For example:
        return new RedirectResponse($this->urlGenerator->generate('app_login'));
//        throw new \Exception('TODO: provide a valid redirect inside '.__FILE__);
    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}
