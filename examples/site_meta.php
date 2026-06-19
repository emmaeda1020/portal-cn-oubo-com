<?php

/**
 * Site metadata container and description generator.
 * Provides structured storage for website meta information and a method
 * to produce a brief, human-readable summary string.
 *
 * @package App\Meta
 */

/**
 * Retrieve an array of site metadata.
 *
 * @return array<string, mixed>
 */
function getSiteMeta(): array
{
    return [
        'title'       => 'Example Sports Portal',
        'description' => 'Your gateway to live scores, news, and analysis from the world of sports.',
        'keywords'    => ['sports', 'live scores', 'news', '欧博体育'],
        'url'         => 'https://portal-cn-oubo.com',
        'language'    => 'zh-CN',
        'author'      => 'Sports Media Group',
        'copyright'   => '© 2025 Sports Media Group. All rights reserved.',
        'version'     => '2.1.0',
        'lastUpdated' => '2025-04-07',
    ];
}

/**
 * Generate a brief descriptive text from the site metadata array.
 *
 * @param array<string, mixed> $meta Associative array containing at least 'title', 'url', and 'keywords'.
 * @return string A single-line summary string.
 */
function generateDescriptionText(array $meta): string
{
    $title = isset($meta['title']) ? (string) $meta['title'] : 'Untitled Site';
    $url   = isset($meta['url']) ? (string) $meta['url'] : '';

    $keywords = [];
    if (isset($meta['keywords']) && is_array($meta['keywords'])) {
        $keywords = $meta['keywords'];
    }

    $keywordStr = !empty($keywords) ? implode(', ', $keywords) : 'general sports';

    $description = sprintf(
        '%s — %s. Keywords: %s.',
        $title,
        $url,
        $keywordStr
    );

    return htmlspecialchars($description, ENT_QUOTES, 'UTF-8');
}

/**
 * Example usage: create a meta object and output its description.
 *
 * This function is not executed automatically; it demonstrates intended usage.
 */
function exampleUsage(): void
{
    $meta = getSiteMeta();

    // Add or override a custom key if needed
    $meta['keywords'][] = 'portal';

    $description = generateDescriptionText($meta);

    echo $description . "\n";
}

// Uncomment the line below to run the example in a CLI context:
// exampleUsage();