<?php

namespace Knp\FriendlyContexts\Builder;


class PostRequestBuilder extends AbstractRequestBuilder
{
    public function build($uri = null, array $queries = null, array $headers = null, array $postBody = null, $body = null, array $options = [])
    {
        parent::build($uri, $queries, $headers, $postBody, $body, $options);

        $resource = $queries ? sprintf('%s?%s', $uri, $this->formatQueryString($queries)) : $uri;

        //set postBody to body if postBody is not set
        //useful for custom json body POST requests
        if (null === $postBody && null !== $body) {
            $postBody = $body;
        }

        return $this->client->post($resource, $headers, $postBody, $options);
    }
}
