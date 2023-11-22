<?php

namespace Source\App;


use Source\Core\Controller;
use Source\Models\Auth;
use Source\Models\Contact;
use Source\Models\Faq\Question;
use Source\Models\Report\Access;
use Source\Models\Report\Online;
use Source\Models\Signature;
use Source\Models\User;
use Source\Models\Post;


/** Web Controler
 * @package Source\App
 */
class Web extends Controller
{
    /**
     * Web Constructor
     */
    public function __construct()
    {
        //Connect::getInstance();
        parent::__construct(__DIR__."/../../themes/" . CONF_VIEW_THEME . "/");

        (new Access())->report();
        (new Online())->report();
//        (new Signature())->completeCampos("ABDEL", "FARACHE");
    }

    /**
     * SITE HOME
     */
    public function home(): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );

        $post = (new Post())->findById(1);
        $post->views += 1;
        $post->save();

        echo $this->view->render("home",
            [
                "head" => $head
            ]);
    }

    /**
     * SITE ABOUT
     * @return void
     */
    public function about(): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME . " - " . CONF_SITE_DESC ,
            CONF_SITE_DESC,
            url("/sobre"),
            theme("/assets/images/share.jpg")
        );

        $post = (new Post())->findById(3);
        $post->views += 1;
        $post->save();

        echo $this->view->render("about",
            [
                "head" => $head
            ]);
    }

    /**
     * SITE BLOG
     * @param array|null $data
     * @return void
     */
    public function contact(?array $data): void
    {
        $head = $this->seo->render(
            "Agenda - " . CONF_SITE_NAME ,
            "Agenda de contatos SMSUB",
            url("/agenda"),
            theme("/assets/images/share.jpg")
        );

        $post = (new Post())->findById(2);
        $post->views += 1;
        $post->save();

        $contact = (new Contact())->find("status = :s", "s=post")->fetch(true);

        echo $this->view->render("contact",
            [
                "head" => $head,
                "contact" => $contact
            ]);
    }

    /**
     * SITE REGISTER
     * @param null|array $data
     * @return void
     */
    public function login(?array $data): void
    {
        if (!empty($data['csrf'])){
            if (!csrf_verify($data)) {
                $json['message'] = $this->message->error("Erro ao enviar, favor use o formulário")->render();
                echo json_encode($json);
                return;
            }
            if(empty($data['email']) || empty($data['password'])){
                $json['message'] = $this->message->warning("Informe seu e-mail e senha para entrar")->render();
                echo json_encode($json);
                return;
            }

            $save = (!empty($data['save']) ? true : false);
            $auth = new Auth();
            $login = $auth->login($data['email'], $data['password'], $save);

            if($login){
                $json['redirect'] = url("/dashboard");
            }else{
                $json['message'] = $auth->message()->render();
            }
            echo json_encode($json);
            return;
        }


        $head = $this->seo->render(
            "Entrar - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url("/entrar"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("auth-login",[
            "head" => $head,
            "cookie" => filter_input(INPUT_COOKIE, "authEmail")
        ]);
    }

    /**
     * SITE FORGET
     * @return void
     * @param null|array $data
     */
    public function forget(?array $data): void
    {

        if (!empty($data['csrf'])) {
            if (!csrf_verify($data)) {
                $json['message'] = $this->message->error("Erro ao enviar, favor use o formulário")->render();
                echo json_encode($json);
                return;
            }

            if(empty($data["email"])){
                $json['message'] = $this->message->info("Informe seu e-mail para continuar")->render();
                echo json_encode($json);
                return;
            }

            $auth = new Auth();
            if($auth->forget($data["email"])){
                $json['message'] = $this->message->success("Acesse seu email {$data['email']} para recuperar a senha.")->render();
            } else {
                $json['message'] = $auth->message()->render();
            }
            echo json_encode($json);
            return;

        }

        $head = $this->seo->render(
            "Recuperar Senha - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url("/recuperar"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("auth-forget",
            [
                "head" => $head
            ]);
    }

    /**
     *  SITE ASSINATURA DE EMAIL
     */

    /**
     * @return void
     * @param null|array $data
     */
      public function creatorCard(): void
      {
          $head = $this->seo->render(
              CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
              CONF_SITE_DESC,
              url(),
              theme("/assets/images/share.jpg")
          );

          $post = (new Post())->findById(4);
          $post->views += 1;
          $post->save();

          echo $this->view->render("email",
              [
                  "head" => $head
              ]);
      }



    /**
     * SITE OPTIN CONFIRM
     * @return void
     */
    public function confirm (): void
    {
        $head = $this->seo->render(
            "Confirme Seu Cadastro - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url("/confirma"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("optin",
            [
                "head" => $head,
                "data" => (object)[
                    "title" => "Falta pouco! Confirme seu cadastro.",
                    "desc" => "Enviamos um link de confirmação para seu e-mail. Acesse e siga as instruções para concluir seu cadastro e comece a controlar com o CaféControl",
                    "image" => theme("/assets/images/optin-confirm.jpg"),
                    "url" => url()
                ]
            ]);
    }

    /**
     * SITE OPTIN SUCCESS
     * @param array $data
     * @return void
     */
    public function success(array $data): void
    {
        $email = base64_decode($data["email"]);
        $user = (new User())->findByEmail($email);

        if($user && $user->status != "confirmed"){
            $user->status = "confirmed";
            $user->save();
        }

        $head = $this->seo->render(
            "Bem-vindo(a) ao" . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url("/obrigado"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("optin",
            [
                "head" => $head,
                //               "data" => $this->seo->data()
                "data" => (object)[
                    "title" => "Tudo pronto. Você já pode controlar :)",
                    "desc" => "Bem-vindo(a) ao seu controle de contas, vamos tomar um café?",
                    "image" => theme("/assets/images/optin-success.jpg"),
                    "link" => url("/entrar"),
                    "linkTitle" => "Fazer Login",
                    "url" => url()
                ]
            ]);
    }



    /**
     * @return void
     */
    public function terms(): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME . " - Termos de Uso",
            CONF_SITE_DESC,
            url("/termos"),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("terms",
            [
                "head" => $head
            ]);
    }

    /**
     * SITE NAV ERROR
     * @param array $data
     * @return void
     */
    public function error(array $data): void
    {
        $error = new \stdClass();

        switch ($data['errcode']) {

            case "problemas":
                $error->code = "OPS";
                $error->title = "Estamos enfrentando problemas";
                $error->message = "Parece que nosso serviço não está disponível no momento. Já estamos vendo isso mas caso precise, envie um e-mail :)";
                $error->linkTitle = "Enviar E-MAIL";
                $error->link = "mailto:" . CONF_MAIL_SUPORT;
                break;

            case "manutencao":
                $error->code = "OPS";
                $error->title = "Desculpe. Estamos em manutenção !";
                $error->message = "Voltamos logo! Por hora estamos trabalhando para melhorar nosso conteúdo para você controlar melhor as suas contas P:";
                $error->linkTitle = null;
                $error->link = null;
                break;

            default:
                $error->code = $data['errcode'];
                $error->title = "Ooops. Conteúdo indisponível :/";
                $error->message = "Sentimos muito, mas o conteúdo que você tentou acessar não existe, está indisponível no momento";
                $error->linkTitle = "Continue navegando!";
                $error->link = url_back();
                break;


        }

        $head = $this->seo->render(
            "{$error->code} | {$error->title}",
            $error->message,
            url("/ops/{$error->code}"),
            theme("/assets/images/share.jpg"),
            false
        );


        echo $this->view->render("error", [
            "head" => $head,
            "error" => $error
        ]);
    }
}