# Originate CMS
This is the core public facing repository for the core Originate CMS. We're still working through the core project to make it ready for a more complete release. Originate provides a generic router and page builder along with asset management, basic twig extensions to access data objects and basic shopping cart functionality.
This is a subtree split of our internal development tree and the history has been removed as this cms has been an internal project for many years and cleaning the history would have been a significant task.

## Requirements
- php7.4
- composer
- mysql 5.7 or 8.0
- The Originate front end Javascript

## Installation
The core cms functionality is provided as a Symfony4.4 bundle allowing it to be used in any existing Symonfy based project.

The current build is for use against php7.4 and php8.0 is currently being tested internally by Gravitate.


```shell
composer create-project symfony/skeleton my_project_name
cd my_project_name
composer require gravitate/originate:dev-master
```

Once the core php application is installed you will need to install the cms javascript which is located in another repository.

```shell
git clone git@github.com:gravitate/originate_fe.git public/cms
```


Add the following to `%%kernel.project_dir%/config/routes.yaml`
```yaml
app_file:
  resource: '@MillenniumFalconBundle/Resources/config/routes.yaml'
```

Add the following security configuration to `%%kernel.project_dir%/config/services.yaml`
```yaml
services:
    MillenniumFalcon\:
        resource: '%kernel.project_dir%/vendor/gravitatenz/originate/*'
        exclude: '%kernel.project_dir%/vendor/gravitatenz/originate/{DependencyInjection,Entity,Migrations,Tests,Kernel.php}'

    MillenniumFalcon\Core\SymfonyKernel\EventListener:
        class: 'MillenniumFalcon\Core\SymfonyKernel\EventListener'
        tags:
            - { name: kernel.event_listener, event: kernel.exception, method: onKernelException }
            - { name: kernel.event_listener, event: kernel.request, method: onKernelController }
```
Add the following to `%%kernel.project_dir%/config/packages/security.yaml`
```yaml
security:
    encoders:
        legacy:
          algorithm: sha512
          
        MillenniumFalcon\Core\ORM\User:
            algorithm: sodium
            migrate_from:
              - legacy

    providers:
        manage:
            id: MillenniumFalcon\Core\Security\UserProvider


    firewalls:
        dev:
            pattern: ^/(_(profiler|wdt)|css|images|js)/
            security: false

        manage:
            anonymous: ~
            pattern: ^/manage
            form_login:
                provider: manage
                check_path: /manage/login_check
                login_path: /manage/login
                default_target_path: /manage/after-login

            logout:
                path: /manage/logout
                target: /manage/login

            remember_me:
                secret:   '%kernel.secret%'
                lifetime: 604800 # 1 week in seconds
                path:     /


    access_control:
        - { path: ^/manage/login, roles: IS_AUTHENTICATED_ANONYMOUSLY }
        - { path: ^/manage, roles: ROLE_ADMIN }
```

Since this is a vey early release there are still some gaps in the documentation and the completeness of the bundle configuration.

&copy; 2018 &ndash; 2021 Gravitate
