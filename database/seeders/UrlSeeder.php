<?php

namespace Database\Seeders;

use App\Models\Url;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UrlSeeder extends Seeder
{
    private array $url_list = ['youtube.com','www.google.com','www.blogger.com','wordpress.org','en.wikipedia.org','cloudflare.com','maps.google.com','mozilla.org','youtu.be','docs.google.com','accounts.google.com','bp.blogspot.com','whatsapp.com','googleusercontent.com','adobe.com','plus.google.com','drive.google.com','sites.google.com','europa.eu','istockphoto.com','amazon.com','t.me','vimeo.com','uol.com.br','github.com','es.wikipedia.org','facebook.com','vk.com','search.google.com','buydomains.com','tools.google.com','mail.ru','slideshare.net','forbes.com','dropbox.com','medium.com','imdb.com','www.weebly.com','youronlinechoices.com','brandbucket.com','myspace.com','news.google.com','globo.com','google.es','developers.google.com','dailymotion.com','theguardian.com','creativecommons.org','pt.wikipedia.org','wikimedia.org','fr.wikipedia.org','paypal.com','files.wordpress.com','feedburner.com','policies.google.com','cnn.com','google.de','bbc.com','live.com','gravatar.com','dan.com','who.int','jimdofree.com','line.me','bbc.co.uk','nih.gov','ok.ru','nytimes.com','google.co.jp','www.yahoo.com','enable-javascript.com','gstatic.com','google.com.br','amazon.co.uk','dailymail.co.uk','amazon.co.jp','cpanel.net','shutterstock.com','networkadvertising.org','ytimg.com','get.google.com','ft.com','researchgate.net','cpanel.com','aboutads.info','google.it','archive.org','domainmarket.com','cdc.gov','webmd.com','huffingtonpost.com','nature.com','washingtonpost.com','independent.co.uk','yandex.ru','cbsnews.com','4shared.com','pixabay.com','mediafire.com','fandom.com','tiktok.com','storage.googleapis.com','twitter.com','mail.google.com','w3.org','scribd.com','afternic.com','usatoday.com','forms.gle','soundcloud.com','abril.com.br','google.pl','list-manage.com','foxnews.com','google.co.uk','businessinsider.com','draft.blogger.com','android.com','estadao.com.br','thesun.co.uk','terra.com.br','ru.wikipedia.org','hatena.ne.jp','namecheap.com','un.org','telegraph.co.uk','office.com','plesk.com','harvard.edu','issuu.com','opera.com','google.ru','telegram.me','msn.com','pinterest.com','cnet.com','ig.com.br','yadi.sk','google.fr','booking.com','mirror.co.uk','reuters.com','change.org','elpais.com','sedo.com','it.wikipedia.org','tripadvisor.com','wsj.com','goo.gl','news.yahoo.com','bit.ly','tinyurl.com','shopify.com','huffpost.com','netvibes.com','wikia.com','indiatimes.com','wa.me','de.wikipedia.org','amazon.es','bloomberg.com','time.com','amazon.de','wp.com','picasaweb.google.com','photos.google.com','imageshack.us','aliexpress.com','t.co','fb.com','nasa.gov','www.gov.uk','www.livejournal.com','amzn.to','offset.com','m.wikipedia.org','aol.com','canada.ca','lemonde.fr','engadget.com','ibm.com','sciencedirect.com','arxiv.org','mit.edu','wired.com','deezer.com','google.ca','newsweek.com','nationalgeographic.com','washington.edu','surveymonkey.com','adssettings.google.com','smh.com.au','ovh.net'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Faker URL generate */
        Url::factory(25)->create();

        foreach ($this->url_list as $url) {
            Url::factory()->create(['url_address' => "https://$url"]);
        }

    }
}
