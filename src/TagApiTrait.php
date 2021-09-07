<?php

namespace UpCloud;

/**
 * Trait for all Tag related API methods.
 */
trait TagApiTrait
{
    /**
     * List tags.
     * @return array<object> Array of tags
     */
    public function getTags()
    {
        $response = $this->httpClient->get("tag");
        return $response->tags->tag;
    }

    /**
     * Create a new tag.
     *
     * @param array $tag Details of the new tag
     * @return object Tag details
     */
    public function createTag(array $tag)
    {
        $response = $this->httpClient->post("tag", ['tag' => $tag]);
        return $response->tag;
    }

    /**
     * Modify a tag.
     *
     * @param string $tagName Name of the tag to modify
     * @param array $tag New details of the tag
     */
    public function modifyTag(string $tagName, array $tag)
    {
        $response = $this->httpClient->put("tag/$tagName", ['tag' => $tag]);
        return $response->tag;
    }

    /**
     * Delete a tag. This will also untag any resource with this tag.
     *
     * @param string $tagName Name of the tag to delete
     */
    public function deleteTag(string $tagName)
    {
        $response = $this->httpClient->delete("tag/$tagName");
        return $response;
    }

    /**
     * Add tags to a server.
     *
     * @param string $serverUuid UUID of the server
     * @param string $tags Array of tags to add to the server
     * @return object Details of the server that got modified.
     */
    public function addServerTag(string $serverUuid, array $tags)
    {
        $response = $this->httpClient->post(
            "server/$serverUuid/tag/" . join(',', $tags),
            null
        );
        return $response->server;
    }

    /**
     * Remove tags from a server.
     *
     * @param string $serverUuid UUID of the server
     * @param string $tags Array of tags to remove from the server
     * @return object Details of the server that got modified.
     */
    public function deleteServerTag(string $serverUuid, array $tags)
    {
        $response = $this->httpClient->post(
            "server/$serverUuid/untag/" . join(',', $tags),
            null
        );
        return $response->server;
    }
}
