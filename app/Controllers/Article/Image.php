<?php

namespace App\Controllers\Article;

use App\Models\ArticleModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Exceptions\PageNotFoundException;
use finfo;
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

        // save to folder project
        $path = WRITEPATH . 'uploads/article_images';  // FCPATH for public directory
        $file->move($path, $file->getClientName());

        // save path to database
        $article->image = $file->getName();
        $this->articleModel->save($article);

        return redirect()->to("articles/$id")
                         ->with("message","Image uploaded");
    }

    public function get($id)
    {
        $article = $this->getArticleor404($id);

        if($article->image){
            
            $path = WRITEPATH . "uploads/article_images/" . $article->image;
            $finfo = new finfo(FILEINFO_MIME);
            $type = $finfo->file($path);

            header("Content-Type: $type");
            header("Content-Length: ". filesize($path));

            readfile($path);
            exit;
        }
    }

    public function delete($id)
    {
        $article = $this->getArticleor404($id);

        $path = WRITEPATH . "uploads/article_images/" . $article->image;

        if(is_file($path)){
            unlink($path);
        }

        $article->image = null;

        $this->articleModel->save($article);

        return redirect()->to("articles/$id")
                         ->with("message","Image removed.");
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
