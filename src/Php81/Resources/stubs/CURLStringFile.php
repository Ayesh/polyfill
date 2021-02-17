<?php

if (extension_loaded('curl') && class_exists(CURLFile::class, false)) {
    /**
     * @property mixed $data
     * https://php.watch/versions/8.1/CURLStringFile#CURLStringFile-polyfill
     */
    class CURLStringFile extends CURLFile
    {
        private $data;

        public function __construct(string $data, string $postname, string $mime = 'application/octet-stream')
        {
            $this->data = $data;
            parent::__construct('data://' . $mime . ';base64,' . base64_encode($data), $mime, $postname);
        }

        public function __set(string $name, $value): void
        {
            if ('data' === $name) {
                $this->name = 'data://application/octet-stream;base64,' . base64_encode($value);
            }

            $this->{$name} = $value;
        }

        public function __isset(string $name): bool
        {
            return isset($this->{$name});
        }

        public function __get(string $name)
        {
            return $this->{$name};
        }
    }
}
