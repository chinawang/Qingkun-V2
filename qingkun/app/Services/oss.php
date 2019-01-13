<?php
/**
 * Created by PhpStorm.
 * User: wangyx
 * Date: 2018/8/14
 * Time: 16:17
 */

namespace App\Services;


use JohnLui\AliyunOSS;

class oss
{
    private $ossClient;
    private static $bucketName;

    public function __construct($isInternal = false)
    {
        $serverAddress = $isInternal ? config('alioss.ossServerInternal') : config('alioss.ossServer');
        $this->ossClient = AliyunOSS::boot(
            config('alioss.city'),
            config('alioss.networkType'),
            $serverAddress,
            config('alioss.AccessKeyId'),
            config('alioss.AccessKeySecret')
        );
    }

//    public static function upload($ossKey, $filePath)
//    {
//        $oss = new OSS(false); // 上传文件使用内网，免流量费
//        $oss->ossClient->setBucket(config('alioss.BucketName'));
//        $res = $oss->ossClient->uploadFile($ossKey, $filePath);
//        return $res;
//    }
//
//    /**
//     * 直接把变量内容上传到oss
//     * @param $osskey
//     * @param $content
//     */
//    public static function uploadContent($osskey, $content)
//    {
//        $oss = new OSS(false); // 上传文件使用内网，免流量费
//        $oss->ossClient->setBucket(config('alioss.BucketName'));
//        $oss->ossClient->uploadContent($osskey, $content);
//
//    }
//
//    /**
//     * 删除存储在oss中的文件
//     *
//     * @param string $ossKey 存储的key（文件路径和文件名）
//     * @return
//     */
//    public static function deleteObject($ossKey)
//    {
//        $oss = new OSS(false); // 上传文件使用内网，免流量费
//
//        return $oss->ossClient->deleteObject(config('alioss.BucketName'), $ossKey);
//    }

    /**
     * 使用外网上传文件
     * @param  string bucket名称
     * @param  string 上传之后的 OSS object 名称
     * @param  string 上传文件路径
     * @return boolean 上传是否成功
     */
    public static function publicUpload($bucketName, $ossKey, $filePath, $options = [])
    {
        $oss = new OSS();
        $oss->ossClient->setBucket($bucketName);
        return $oss->ossClient->uploadFile($ossKey, $filePath, $options);
    }

    /**
     * 使用阿里云内网上传文件
     * @param  string bucket名称
     * @param  string 上传之后的 OSS object 名称
     * @param  string 上传文件路径
     * @return boolean 上传是否成功
     */
    public static function privateUpload($bucketName, $ossKey, $filePath, $options = [])
    {
        $oss = new OSS(true);
        $oss->ossClient->setBucket($bucketName);
        return $oss->ossClient->uploadFile($ossKey, $filePath, $options);
    }

    /**
     * 使用外网直接上传变量内容
     * @param  string bucket名称
     * @param  string 上传之后的 OSS object 名称
     * @param  string 上传的变量
     * @return boolean 上传是否成功
     */
    public static function publicUploadContent($bucketName, $ossKey, $content, $options = [])
    {
        $oss = new OSS();
        $oss->ossClient->setBucket($bucketName);
        return $oss->ossClient->uploadContent($ossKey, $content, $options);
    }

    /**
     * 使用阿里云内网直接上传变量内容
     * @param  string bucket名称
     * @param  string 上传之后的 OSS object 名称
     * @param  string 上传的变量
     * @return boolean 上传是否成功
     */
    public static function privateUploadContent($bucketName, $ossKey, $content, $options = [])
    {
        $oss = new OSS(true);
        $oss->ossClient->setBucket($bucketName);
        return $oss->ossClient->uploadContent($ossKey, $content, $options);
    }

    /**
     * 使用外网删除文件
     * @param  string bucket名称
     * @param  string 目标 OSS object 名称
     * @return boolean 删除是否成功
     */
    public static function publicDeleteObject($bucketName, $ossKey)
    {
        $oss = new OSS();
        $oss->ossClient->setBucket($bucketName);
        return $oss->ossClient->deleteObject($bucketName, $ossKey);
    }

    /**
     * 使用阿里云内网删除文件
     * @param  string bucket名称
     * @param  string 目标 OSS object 名称
     * @return boolean 删除是否成功
     */
    public static function privateDeleteObject($bucketName, $ossKey)
    {
        $oss = new OSS(true);
        $oss->ossClient->setBucket($bucketName);
        return $oss->ossClient->deleteObject($bucketName, $ossKey);
    }

    /**
     * 复制存储在阿里云OSS中的Object
     *
     * @param string $sourceBuckt 复制的源Bucket
     * @param string $sourceKey - 复制的的源Object的Key
     * @param string $destBucket - 复制的目的Bucket
     * @param string $destKey - 复制的目的Object的Key
     * @return Models\CopyObjectResult
     */
    public function copyObject($sourceBuckt, $sourceKey, $destBucket, $destKey)
    {
        $oss = new OSS(true); // 上传文件使用内网，免流量费

        return $oss->ossClient->copyObject($sourceBuckt, $sourceKey, $destBucket, $destKey);
    }

    /**
     * 移动存储在阿里云OSS中的Object
     *
     * @param string $sourceBuckt 复制的源Bucket
     * @param string $sourceKey - 复制的的源Object的Key
     * @param string $destBucket - 复制的目的Bucket
     * @param string $destKey - 复制的目的Object的Key
     * @return Models\CopyObjectResult
     */
    public function moveObject($sourceBuckt, $sourceKey, $destBucket, $destKey)
    {
        $oss = new OSS(true); // 上传文件使用内网，免流量费

        return $oss->ossClient->moveObject($sourceBuckt, $sourceKey, $destBucket, $destKey);
    }

    public static function getUrl($ossKey)
    {
        $oss = new OSS();
        $oss->ossClient->setBucket(config('alioss.BucketName'));
        return $oss->ossClient->getUrl($ossKey, new \DateTime("+1 day"));
    }

    public static function createBucket($bucketName)
    {
        $oss = new OSS();
        return $oss->ossClient->createBucket($bucketName);
    }

    public static function getAllObjectKey($bucketName)
    {
        $oss = new OSS();
        return $oss->ossClient->getAllObjectKey($bucketName);
    }

    /**
     * 获取指定Object的元信息
     *
     * @param  string $bucketName 源Bucket名称
     * @param  string $key 存储的key（文件路径和文件名）
     * @return object 元信息
     */
    public static function getObjectMeta($bucketName, $osskey)
    {
        $oss = new OSS();
        return $oss->ossClient->getObjectMeta($bucketName, $osskey);
    }
}
