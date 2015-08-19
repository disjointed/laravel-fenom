<?php namespace Neva\Fenom;


use Fenom\Provider;
use Fenom\ProviderInterface;

class FenomProvider implements ProviderInterface
{
    /**
     * @var string
     */
    protected $path;

    /**
     * @var Provider
     */
    protected $provider;

    /**
     * @param string $path
     */
    public function __construct($path)
    {
        $this->path = $path;
        $this->provider = new Provider($path);
    }

    public function templateExists($tpl)
    {
        return $this->provider->templateExists($this->parsePath($tpl));
    }

    public function getSource($tpl, &$time)
    {
        return $this->provider->getSource($this->parsePath($tpl), $time);
    }

    public function getLastModified($tpl)
    {
        return $this->provider->getLastModified($this->parsePath($tpl));
    }

    public function verify(array $templates)
    {
        return $this->provider->verify($templates);
    }

    public function getList()
    {
        return $this->provider->getList('fenom.php');
    }

    protected function parsePath($tpl)
    {
        return \Str::removePrefix($tpl, $this->path);
    }
}