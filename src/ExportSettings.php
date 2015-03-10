<?php
/**
 * This file is part of Vegas Exporter package.
 *
 * @author Radosław Fąfara <radek@amsterdam-standard.pl>
 * @copyright Amsterdam Standard Sp. Z o.o.
 * @homepage https://github.com/vegas-cmf/exporter
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vegas\Exporter;


class ExportSettings
{
    use ConfigurableTrait;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var array
     */
    protected $headers;

    /**
     * @var bool
     */
    protected $headerKeysAsParams;

    /**
     * @var array
     */
    protected $extraSettings = [];

    /**
     * @var string
     */
    protected $template;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $filename;

    /**
     * @var string
     */
    protected $outputDir;

    public function __construct()
    {
        $this->filename = 'export_file_' . time();
        $this->outputDir = sys_get_temp_dir();
        $this->headerKeysAsParams = false;
    }

    /**
     * Sets data for export purposes. This could be an array of arrays or objects
     * @param array $data
     * @return $this
     */
    public function setData(array $data = [])
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Sets export headers (parameters to be used for exports)
     * @param array $headers
     * @return $this
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * Sets whether to use header keys or values as params
     * @param boolean $headerKeysAsParams
     * @return $this
     */
    public function setHeaderKeysAsParams($headerKeysAsParams)
    {
        $this->headerKeysAsParams = (bool)$headerKeysAsParams;
        return $this;
    }

    /**
     * Sets HTML view template path to render provided data in a decorated way
     * @param string $template
     * @return $this
     */
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

    /**
     * Allows to specify a title of exported document, where available
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Sets optional adapter specific settings (like CSV separator)
     * This needs to be handled by adapter
     * @param array $extraSettings
     * @return $this
     */
    public function setExtraSettings(array $extraSettings)
    {
        $this->extraSettings = $extraSettings;
        return $this;
    }

    /**
     * @param string $filename
     * @return $this
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
        return $this;
    }

    /**
     * @param string $outputDir
     * @return $this
     */
    public function setOutputDir($outputDir)
    {
        $this->outputDir = $outputDir;
        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @return array
     */
    public function getExtraSettings()
    {
        return $this->extraSettings;
    }

    /**
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @return string
     */
    public function getOutputDir()
    {
        return $this->outputDir;
    }

    /**
     * @return array
     */
    public function getHeaderParams()
    {
        return $this->headerKeysAsParams
            ? array_keys($this->headers)
            : array_values($this->headers);
    }

    /**
     * @return boolean
     */
    public function isHeaderKeysAsParams()
    {
        return $this->headerKeysAsParams;
    }
}