<?php

/**
 * @Annotation
 */
class SwaggerTagGroup
{
    public string $name;
    public object $tags;


    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->tags = $data['tags'];
    }
}
class OpenApiTags
{
}
