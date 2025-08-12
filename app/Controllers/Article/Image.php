<?php

namespace App\Controllers\Article;

use App\Models\ArticleModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Exceptions\PageNotFoundException;
use RuntimeException;

class Image extends BaseController
{

    protected ArticleModel $articleModel;

    public function __construct()
    {
        $this->articleModel = new ArticleModel();
    }

    public function new($id)
    {
        $article = $this->getArticleor404($id);

        return view("Article/Image/new",[
            'article' => $article,
        ]);
    }

    public function create($id)
    {
        $article = $this->getArticleor404($id);
        $file = $this->request->getFile("article_image");

        if(!$file->isValid()){
            $error_code = $file->getError();

            if($error_code == UPLOAD_ERR_NO_FILE){
                return redirect()->back()
                                 ->with("errors",["No file selected"]);
            }

            throw new RuntimeException($file->getErrorString() . " " . $error_code);
        }
        
        // size
        if($file->getSizeByUnit("mb") > 2){
            return redirect()->back()
                            ->with("errors",["File too large"]);
        }
        
        // type
        if(!in_array($file->getMimeType(),["image/png","image/jpeg","image/jpg"])){
            return redirect()->back()
                             ->with("errors",["Invalid file format"]);
        }
    }

    private function getArticleor404($id)
    {
        $article = $this->articleModel->find($id);

        if (!$article) {
            throw PageNotFoundException::forPageNotFound("Article not found");
        }

        return $article;
    }
}
