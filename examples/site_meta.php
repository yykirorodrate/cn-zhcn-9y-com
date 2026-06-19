<?php

/**
 * Site metadata management utility.
 * Provides an array-based structure for storing site information
 * and a method to generate a short descriptive text.
 */

function getDefaultSiteMeta(): array
{
    return [
        'site_name' => '九游',
        'site_url' => 'https://cn-zhcn-9y.com',
        'keywords' => ['九游', '游戏', '玩家社区'],
        'description' => '九游是一个专注于游戏玩家交流与资讯分享的平台。',
        'language' => 'zh-CN',
        'version' => '1.0',
    ];
}

function generateShortDescription(array $meta): string
{
    $name = $meta['site_name'] ?? '未知站点';
    $url = $meta['site_url'] ?? '';
    $keywords = $meta['keywords'] ?? [];
    $keywordStr = implode(', ', $keywords);

    $parts = [];
    $parts[] = "站点名称：{$name}";
    if ($url !== '') {
        $parts[] = "URL：{$url}";
    }
    if ($keywordStr !== '') {
        $parts[] = "关键词：{$keywordStr}";
    }

    return implode(' | ', $parts);
}

function renderMetaBlock(array $meta): string
{
    $name = htmlspecialchars($meta['site_name'] ?? '', ENT_QUOTES, 'UTF-8');
    $url = htmlspecialchars($meta['site_url'] ?? '', ENT_QUOTES, 'UTF-8');
    $desc = htmlspecialchars($meta['description'] ?? '', ENT_QUOTES, 'UTF-8');
    $lang = htmlspecialchars($meta['language'] ?? 'zh-CN', ENT_QUOTES, 'UTF-8');

    $output = '<meta charset="UTF-8">' . "\n";
    $output .= '<meta name="language" content="' . $lang . '">' . "\n";
    $output .= '<meta name="description" content="' . $desc . '">' . "\n";
    $output .= '<title>' . $name . '</title>' . "\n";
    $output .= '<base href="' . $url . '">' . "\n";

    return $output;
}

// Example usage:
$meta = getDefaultSiteMeta();
echo generateShortDescription($meta) . "\n";
echo renderMetaBlock($meta);