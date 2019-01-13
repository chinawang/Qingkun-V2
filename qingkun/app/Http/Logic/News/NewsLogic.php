<?php
/**
 * Created by PhpStorm.
 * User: wangyx
 * Date: 2018/8/13
 * Time: 09:56
 */

namespace App\Http\Logic\News;

//use App\Repositories\News\NewsRepository;
use App\Repositories\Article\ArticleRepository;
use Support\Logic\Logic;

class NewsLogic extends Logic
{
    protected $postRepository;

    public function __construct(ArticleRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function findPost($postId)
    {
        $conditions = ['delete_process' => 0,'id' => $postId];
        $post = $this->postRepository->findBy($conditions);
        return $post;
    }

    public function getPosts($pageSize, $orderColumn, $orderDirection, $cursorPage = null)
    {
        $conditions = ['delete_process' => 0];
        $postList = $this->postRepository->getPaginate($conditions,$pageSize,$orderColumn,$orderDirection,$cursorPage);
        return $postList;
    }

    public function getPostsBy($conditions,$pageSize, $orderColumn, $orderDirection, $cursorPage = null)
    {
        $postList = $this->postRepository->getPaginate($conditions,$pageSize,$orderColumn,$orderDirection,$cursorPage);
        return $postList;
    }

    public function getPostsByIDs($postIDs)
    {
        $postList = $this->postRepository->get($postIDs);
        return $postList;
    }

    public function getAllPosts()
    {
        $conditions = ['delete_process' => 0];
        $postList = $this->postRepository->getBy($conditions);
        return $postList;
    }

    public function createPost($attributes)
    {
        return $this->postRepository->create($attributes);
    }

    public function updatePost($postId,$input)
    {
        return $this->postRepository->update($postId,$input);
    }

    public function deletePost($postId)
    {
        return $this->postRepository->deleteByFlag($postId);
    }

}
