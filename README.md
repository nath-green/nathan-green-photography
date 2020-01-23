# Nathan Green Photography

Theme for Anchor CMS using Tailwind.

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

- Update `/anchor/config/app.php`

Set `url` to empty string
Set `index` to empty string

- Create a new function in `/anchor/functions/users.php`

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

- Create new functions in `/anchor/functions/helpers.php`

```
function base_domain_url($append = '') {
    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['SERVER_NAME'] . $append;
}

function complete_url() {
    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}
```

- Add sitemap generator `Route` in `/anchor/routes/site.php`

**This has to be before the `View Pages` function**

Note: This will create a Sitemap dynamically when hitting the route, no physical file will be created.

```
/** * Sitemap */

Route::get('blog-sitemap.xml', function() { $sitemap = ''; $sitemap .= ' ';

    // Main page
    $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"><url>';
    $sitemap .= '<loc>' . Uri::full(Registry::get('posts_page')->slug . '/') . '</loc>';
    $sitemap .= '<priority>0.9</priority>';
    $sitemap .= '<changefreq>weekly</changefreq>';
    $sitemap .= '</url>';

    while(categories()):
        $sitemap .= '<url>';
        $sitemap .= '<loc>' . base_domain_url() . category_url() . '</loc>';
        $sitemap .= '<changefreq>monthly</changefreq>';
        $sitemap .= '<priority>0.8</priority>';
        $sitemap .= '</url>';
    endwhile;

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

  - `blog_description`
  - `blog_heading`
  - `facebook_url`
  - `instagram_url`

- Add custom fields to type `post`

**Hero Image**

| Key        | Value        |
| ---------- | ------------ |
| Type       | `post`       |
| Field      | `image`      |
| Unique key | `hero`       |
| Label      | `Hero Image` |

**Hero Image Alt Text**

| Key        | Value                 |
| ---------- | --------------------- |
| Type       | `post`                |
| Field      | `text`                |
| Unique key | `image_alt`           |
| Label      | `Hero Image Alt Text` |

**OG Image**

| Key        | Value      |
| ---------- | ---------- |
| Type       | `post`     |
| Field      | `image`    |
| Unique key | `og_image` |
| Label      | `OG Image` |

- Add custom fields to type `user`

**Avatar**

| Key        | Value    |
| ---------- | -------- |
| Type       | `user`   |
| Field      | `image`  |
| Unique key | `avatar` |
| Label      | `Avatar` |

- Add custom fields to type `page`

**Meta Description**

| Key        | Value              |
| ---------- | ------------------ |
| Type       | `page`             |
| Field      | `text`             |
| Unique key | `meta_description` |
| Label      | `Meta Description` |

**Meta Title**

| Key        | Value        |
| ---------- | ------------ |
| Type       | `page`       |
| Field      | `text`       |
| Unique key | `meta_title` |
| Label      | `Meta Title` |

### Theme generation and installation

- Run `yarn prod`

This will generate a new `/dist` folder, these are your theme files.

- Copy/push the newly generated files into a folder within `/anchor/themes`

Note: the generated theme files need to be in a folder within `/themes`
