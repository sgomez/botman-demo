# BotMan Bundle Demo
> A simple echo bot for multiples platforms

This is a demo project that use [sgomez/botman-bundle](https://github.com/sgomez/botman-bundle/).
A Symfony bundle for [BotMan](https://botman.io/), a PHP chatbot framework.
 
## Drivers supported

* [Facebook](https://botman.io/2.0/driver-facebook-messenger)
* [Telegram](https://botman.io/2.0/driver-telegram)

## How to install

1. Download or clone this project.

1. Install dependencies with `composer install`.

1. Go to [serveo.net](http://serveo.net/) and run a https tunnel:
    ```
    ssh -R 80:localhost:8000 serveo.net
    ```
     
    Serveo will give you a public url to expose your server. You will need it to the next step.
 
1. Edit `.env` file and fill only this variable:
    
    ```dotenv
    ROUTER_REQUEST_CONTEXT_HOST=your.serveo.net
    ```
    
    Change `your.serveo.net` with the hostname that _Serveo_ assigned to you. 

1. Copy config template:

        cp config/packages/botman.yaml.dist config/packages/botman.yaml

## Configuring drivers

### Configure Facebook driver

1. Uncomment _Facebook Messenger_ driver section in `config/packages/botman.yaml` file.

1. Edit `.env` file and fill only this variables:
    
    ```dotenv
    FACEBOOK_TOKEN=your-facebook-page-token
    FACEBOOK_VERIFICATION=your-facebook-verification-token
    FACEBOOK_APP_SECRET=your-facebook-app-secret
    ```
    
    If you want to know how to obtain them read the [official BotMan documentation](https://botman.io/2.0/driver-facebook-messenger).

1. Configure the next webhook in the Facebook Developer bot dashboard:

        https://your.serveo.net/botman

1. Optionally you can configure a greeting message:

    ```
    bin/console botman:facebook:greeting
    ```

### Configure Telegram driver

1. Uncomment _Telegram_ driver section in `config/packages/botman.yaml` file.

1. Edit `.env` file and fill only this variables:
    
    ```dotenv
    TELEGRAM_BOT_API=your-bot-token
    ```
    
    If you need a bot token read the [official documentation](https://core.telegram.org/bots).

1. Configure the webhook:

    ```
    bin/console botman:telegram:webhook
    ```
    
    You can check the webhook url has been configured properly with:
    
    ```
    bin/console botman:telegram:info
    
    Current webhook status
    ======================
    
    url: https://your.serveo.net/botman
    ```
    
    Remember to update your _.env_ and _webhook_ configuration every time your _Serveo_ hostname changes.

## Start project
    
1. Run symfony server

    ```
    bin/console server:run
    ```
    
Now, you can talk to your _echo bot_.
