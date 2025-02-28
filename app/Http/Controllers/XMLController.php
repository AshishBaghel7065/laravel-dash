<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use SimpleXMLElement;
use App\Models\SeoPage;
use App\Models\Blog;
use App\Models\Service;
use App\Models\Gallery;
use Illuminate\Support\Str;

class XMLController 
{
    public function generateXML()
    {
        // Create root XML element with image namespace
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"></urlset>');

        // Add different sections to XML
        $this->addSeoPagesToXML($xml);
        $this->addBlogsToXML($xml);
        $this->addServicesToXML($xml);
        $this->addGalleryToXML($xml);

        // Convert XML to string
        $xmlContent = $xml->asXML();

        // Save XML file
        $filePath = public_path('sitemap.xml');
        File::put($filePath, $xmlContent);

        return Response::make($xmlContent, 200, ['Content-Type' => 'application/xml']);
    }

    private function addSeoPagesToXML($xml)
    {
        $pages = SeoPage::all();

        foreach ($pages as $page) {
            $pageSlug = $this->extractPageName($page->seopage);

            $url = $xml->addChild('url');
            $url->addChild('loc', url('/'.$page->seopage));
            $url->addChild('lastmod', $page->updated_at->format('Y-m-d'));
            $url->addChild('changefreq', $this->getChangeFrequency($pageSlug));
            $url->addChild('priority', $this->getPriority($pageSlug));
        }
    }

    private function addBlogsToXML($xml)
    {
        $blogs = Blog::where('active', 1)->latest()->get();

        foreach ($blogs as $blog) {
            $url = $xml->addChild('url');
            $url->addChild('loc', url('/blog/' . $blog->slug));
            $url->addChild('lastmod', $blog->updated_at->format('Y-m-d'));
            $url->addChild('changefreq', 'weekly');
            $url->addChild('priority', '0.7');

            if (!empty($blog->image)) {
                $image = $url->addChild('image:image', null, 'http://www.google.com/schemas/sitemap-image/1.1');
                $image->addChild('image:loc', url('/storage/' . $blog->image), 'http://www.google.com/schemas/sitemap-image/1.1');
                $image->addChild('image:title', htmlspecialchars($blog->title), 'http://www.google.com/schemas/sitemap-image/1.1');
            }
        }
    }

    private function addServicesToXML($xml)
    {
        $services = Service::all();

        foreach ($services as $service) {
            $slug = Str::slug($service->service);
            $url = $xml->addChild('url');
            $url->addChild('loc', url('/service/' . $slug));
            $url->addChild('lastmod', $service->updated_at->format('Y-m-d'));
            $url->addChild('changefreq', 'weekly');
            $url->addChild('priority', '0.8');

            if (!empty($service->image)) {
                $image = $url->addChild('image:image', null, 'http://www.google.com/schemas/sitemap-image/1.1');
                $image->addChild('image:loc', url('/storage/' . $service->image), 'http://www.google.com/schemas/sitemap-image/1.1');
                $image->addChild('image:title', htmlspecialchars($service->service), 'http://www.google.com/schemas/sitemap-image/1.1');
            }
        }
    }

    private function addGalleryToXML($xml)
    {
        $galleryImages = Gallery::all();

        foreach ($galleryImages as $image) {
            $url = $xml->addChild('url');
            $url->addChild('loc', url('/storage/'. $image->image));
            $url->addChild('lastmod', $image->updated_at->format('Y-m-d'));
            $url->addChild('changefreq', 'weekly');
            $url->addChild('priority', '0.85');

            if (!empty($image->image)) {
                $imageTag = $url->addChild('image:image', null, 'http://www.google.com/schemas/sitemap-image/1.1');
                $imageTag->addChild('image:loc', url('/storage/' . $image->image), 'http://www.google.com/schemas/sitemap-image/1.1');
                $imageTag->addChild('image:title', htmlspecialchars($image->title), 'http://www.google.com/schemas/sitemap-image/1.1');
            }
        }
    }

    private function extractPageName($url)  
    {
        $segments = explode('/', trim($url, '/'));
        return $segments[0] ?? 'default';
    }

    private function getChangeFrequency($page)
    {
        $frequencies = [
            '' => 'daily',
            'about' => 'monthly',
            'blog' => 'weekly',
            'service' => 'weekly',
            'contact' => 'yearly',
            'gallery' => 'monthly',
        ];

        return $frequencies[$page] ?? 'monthly';
    }

    private function getPriority($page)
    {
        $priorities = [
            '' => '1.0',
            'about' => '0.8',
            'blog' => '0.7',
            'service' => '0.9',
            'contact' => '0.6',
            'gallery' => '0.85'
        ];

        return $priorities[$page] ?? '0.5';
    }
}
