<?php

namespace App\Console\Commands;

use App\Models\Blog;
use App\Models\News;
use App\Models\Service;
use DOMDocument;
use DateTime;
use GuzzleHttp\Psr7\Header;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class GenerateSitemap extends Command
{

    public $data = [];
    public $path = '';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command generates sitemap for the website.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {

            $services = Service::where(['active' => 1])->get();
            $news = News::where(['active' => 1])->get();
            $blogs = Blog::where(['active' => 1])->get();
            $urls = [];

            ini_set("memory_limit", "-1");
            set_time_limit(0);
            ini_set('max_execution_time', 0);
            ignore_user_abort(true);
            foreach ($services as $service) {
                $urls[] = '/services/' . $service->url;
            }
            foreach ($news as $new) {
                $urls[] = '/news/' . $new->url;
            }
            foreach ($blogs as $blog) {
                $urls[] = '/blog/' . $blog->url;
            }

            if (!file_exists(public_path('/sitemap'))) {
                mkdir(public_path('sitemap/', 0777, true));
            }
            Header('Content-type: text/xml');
            $time = new DateTime;
            $dom = new DOMDocument('1.0', 'UTF-8');

            // Main root tag.
            $root = $dom->createElement('urlset');
            $dom->appendChild($root);
            $root->setAttribute('xmlns', "http://www.sitemaps.org.schems/sitemap/0.9");
            $root->setAttribute('xmlns:xhtml', "http://www.w3.org/1999/xhtml");
            $root->setAttribute('xmlns:image', "http://www.google.com/schemas/sitemap-image/1.1");
            $root->setAttribute('xmlns:video', "http://www.google.com/schemas/sitemap-video/1.1");

            $this->path = public_path('/sitemap/');
            $fileName = 'sitemap';


            //Rename old sitemap


            if (file_exists($this->path . $fileName . '.xml')) {
                chmod($this->path, 0777);
                chmod($this->path . $fileName . '.xml', 0777);
                rename($this->path . $fileName . '.xml', $this->path . 'sitemap-old-' . date('D_d-M-Y h-m-s') . '.xml');
            }

            foreach ($urls as $url) {
                if (isset($url)) {
                    $result = $dom->createElement('url');
                    $root->appendChild($result);
                    $result->appendChild($dom->createElement('loc', "https://zarx.biz" . $url));
                    $result->appendChild($dom->createElement('priority', '1.0'));
                    $result->appendChild($dom->createElement('lastmod', $time->format(DateTime::ATOM)));


                    $dom->save(public_path('/sitemap/' . $fileName . '.xml'));
                }
            }

            if (env('APP_ENV') == 'local') {
                $dom->save(public_path('/sitemap/' . $fileName . '.xml'));
                return;
            }
            // dd($urls);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}