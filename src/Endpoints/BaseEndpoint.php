<?php

namespace Byte5\LaravelHarvest\Endpoints;

abstract class BaseEndpoint
{
    /**
     * @var string
     */
    protected $apiV2Url = '//api.harvestapp.com/v2/';

    /**
     * @var
     */
    protected $baseId;

    /**
     * @var array
     */
    protected $params = [];
    
    protected $patchdata;

    /**
     * @var
     */
    protected $url;

    /**
     * @return mixed
     */
    abstract protected function getPath();

    /**
     * @return mixed
     */
    abstract public function getModel();

    /**
     * @return mixed
     */
    public function get()
    {
        $this->buildUrl();

        return $this->getUrl();
    }

    public function post($patchdata)
    {
        
        $this->buildUrl();
        return $this->getUrl($patchdata);

    }

    public function patch($id, $patchdata)
    {
         
        $this->buildUrl('/'.$id);
        return $this->getUrl($patchdata);

    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $this->buildUrl('/'.$id);

        return $this->getUrl();
    }

    /**
     * @param $subPath
     */
    protected function buildUrl($subPath = '')
    {
        $path = $this->replaceVarsInPath();

        $fullPath = $this->apiV2Url.$path.$subPath;
        $params = $this->getUrlParams();

        $this->url = $fullPath.$params;
    }

    /**
     * Get endpoint url.
     *
     * @return mixed
     */
    public function getUrl($data = null)
    {

        return array('url' => $this->url, 'patchdata' => $data);
    }

    /**
     * @return string
     */
    public function getUrlParams()
    {
        return count($this->params) ? '?'.http_build_query($this->params) : '';
    }

    /**
     * @param $limit
     */
    public function limit($limit)
    {
        $this->params += ['per_page' => $limit];
    }

    /**
     * @param $page
     */
    public function page($page)
    {
        $this->params += ['page' => $page];
    }

    public function patchdata($data)
    {
        return $data;
    }

    /**
     * @param bool $active
     */
    public function active($active = true)
    {
        $this->params += ['is_active' => $active ? 'true' : 'false'];
    }

    /**
     * @return mixed|null|string|string[]
     */
    private function replaceVarsInPath()
    {
        $tmpPath = $this->getPath();

        if (! $this->baseId || ! str_contains($tmpPath, '{')) {
            return $tmpPath;
        }

        return preg_replace('/\{.*\}/', $this->baseId, $tmpPath);
    }
}
