# anchor-tailwind

Basic theme for Anchor CMS using Tailwind

## Anchor CMS Installation

- Download the latest Anchor zip installation from [here]('https://anchorcms.com/download')
- Extract .zip file to subdirectory (for example: `/blog`)
- Create a database for Anchor to connect to (phpMyAdmin)
- Navigate to the new subdirectory to install Anchor
- Once installation is complete, delete the `install` folder
- Create a `.htaccess` file in the root of the subdirectory, this will remove the stray `/index.php/` in the url

```
<IfModule mod_rewrite.c>
  RewriteEngine On
  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteRule ^ index.php [L]
</IfModule>
```

### Prep site for theme installation

- Create a new function in `/anchor/functions/users.php/`

```
function user_custom_field($key, $default = '', $id = null) {
  if ($id == null) {
    $id = user_authed_id();
  }

  if ($extend = Extend::field('user', $key, $id)) {
    return Extend::value($extend, $default);
  }

  return $default;
}
```

- Add sitemap generator `Route` in `/anchor/router/sites.php`

**This has to be before the `View Pages` function**

Note: This will create a Sitemap dynamically when hitting the route, no physical file will be created.

```
/** * Sitemap */

Route::get('sitemap.xml', function() { $sitemap = ''; $sitemap .= ' ';

// Main page
$sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"><url>';
$sitemap .= '<loc>' . Uri::full(Registry::get('posts_page')->slug . '/') . '</loc>';
$sitemap .= '<priority>0.9</priority>';
$sitemap .= '<changefreq>weekly</changefreq>';
$sitemap .= '</url>';

$query = Post::where('status', '=', 'published')->sort(Base::table('posts.created'), 'desc');
foreach($query->get() as $article) {
  $sitemap .= '<url>';
  $sitemap .= '<loc>' . Uri::full(Registry::get('posts_page')->slug . '/' . $article->slug) . '</loc>';
  $sitemap .= '<lastmod>' . date("Y-m-d", strtotime($article->created)) .'</lastmod>';
  $sitemap .= '<changefreq>monthly</changefreq>';
  $sitemap .= '<priority>0.8</priority>';
  $sitemap .= '</url>';
}
$sitemap .= '</urlset>';

return Response::create($sitemap, 200, array('content-type' => 'application/xml'));
});
```

- Add site variables to Admin Panel in `Extend -> Site Variables`

`website_url`
`google_analytics_tracking_id`
`heading`
`facebook_url`
`instagram_url`
`faq_url`

- Add custom fields to type `post`

**Hero Image**

| Key        | Value        |
| ---------- | ------------ |
| Type       | `post`       |
| Field      | `image`      |
| Unique key | `hero`       |
| Label      | `Hero Image` |

**OG Image**

| Key        | Value        |
| ---------- | ------------ |
| Type       | `post`       |
| Field      | `image`      |
| Unique key | `og_image`       |
| Label      | `OG Image` |

- Add custom fields to type `user`

**Avatar**

| Key        | Value    |
| ---------- | -------- |
| Type       | `user`   |
| Field      | `image`  |
| Unique key | `avatar` |
| Label      | `Avatar` |

### Theme generation and installation

- Run `yarn prod`

This will generate a new `/dist` folder, these are your theme files.

- Copy/push the newly generated files into a folder within `/anchor/themes`

Note: the generated theme files need to be in a folder within `/themes`
