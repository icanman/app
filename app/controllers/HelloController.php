<?php

use MyApp\MyClass;

class HelloController extends \Sketch\BaseController {

    /**
     * @var Post
     */
    protected $post_model;

    /**
     * @var MyApp\MyClass
     */
    protected $my_class;

    public function __construct(Post $post_model, MyClass $my_class)
    {
        $this->post_model = $post_model;
        $this->my_class = $my_class;
    }


    public function index()
    {
        $data = [
          'page' => $this->request->query->get('page'),
          'posts' => $this->post_model->all(),
          'ello' => $this->my_class->ello()
        ];

        $this->render('hello::hello', $data);
    }

    public function submenu()
    {
        $this->render('hello::submenu');
    }

    public function metabox($post, $metabox)
    {
        $data = [
            'post' => $post,
            'metabox' => $metabox
        ];
        $this->render('hello::metabox', $data);
    }
}