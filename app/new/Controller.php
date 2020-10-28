<?php

class ControllerNew extends Controller
{
    public function __construct($model, $view)
    {
        $this->model = $model;
        $this->view  = $view;
    }
    
    public function actionDefault()
    {
        $data['error']         = false;
        $data['success']       = false;
        $data['exhibit']       = false;
        $data['comment']       = false;
        $data['live']          = false;
        $data['name']          = false;
        $data['email']         = false;
        $data['title']         = $this->model->getMeta()['title'];
    
        if (sizeof($_POST) != 0) {
            $required = ['exhibit', 'live'];
            
            foreach ($required as $key) {
                if (isset($_POST[$key])) {
                    if (empty($_POST[$key])) {
                        $data['error'] = Errors::formDataRequired();
                        break;                        
                    } 
                } else {
                    $data['error'] = Errors::formDataRequired();
                    break;                    
                }                    
            }

            if ($data['error']) {
                $data['text']  = "Так не пойдет! Мне нужен сам экземпляр и его исправленная версия!";
                $data['error'] = $this->view->makeContent($data, 'error.tpl.php');
                
                foreach ($_POST as $key => $val) {
                    $data[$key] = userpost($val);
                }
                
                $data['content'] = $this->view->makeContent($data);
                $this->view->drawContent($data);
                exit;
            }

            foreach ($_POST as $key => $val) {
                $$key = userpost($val);
            }
            
            $post_data = ['secret' => 'very_secret_code_here', 'response' => $_POST['recaptchaResponse']];
            $google_answer = curl_post("https://www.google.com/recaptcha/api/siteverify", $post_data);
            $google_answer = json_decode($google_answer);
            
            if($google_answer->success == 1)
            {
                if($google_answer->score > 0.5) {
                    $this->model->addSuggestion();
                    //phpmail("info@mamagramma.ru", "outlookbox@mail.ru", "Новый экспонат, ёлки палки!", "ня!", "");
                    
                    $data['text']  = "Спасибо! Я пригляжусь к вашему предложению и если оно мне понравится,<br> то я обязательно добавлю его в свою коллекцию! :)";
                    $data['success'] = $this->view->makeContent($data, 'success.tpl.php');
                } else {
                    $data['text']  = "Вы меня простите, но мистер Гугл мне сказал, что вы бот. Вот :(";
                    $data['error'] = $this->view->makeContent($data, 'error.tpl.php');
                }
            }
        }
    
        $meta = $this->model->getMeta();

        $content   = $this->view->makeContent($data);
        $data['title']   = $meta['title'];
        $data['content'] = $content;
        $this->view->drawContent($data);
    }
}