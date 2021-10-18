<?php echo '<?xml version="1.0" encoding="UTF-8" ?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">
        <url>
            <loc>{{route('website.home')}}</loc>
            <lastmod>2021-09-09 12:25:06</lastmod>
            <priority>1</priority>
        </url>
        <url>
            <loc>{{route(('website.institutes'))}}</loc>
            <lastmod>2021-09-09 12:25:06</lastmod>
            <priority>2</priority>
        </url>
        <url>
            <loc>{{route('order-visa.create')}}</loc>
            <lastmod>2021-09-09 12:25:06</lastmod>
            <priority>3</priority>
        </url>
        <url>
            <loc>{{route('website.offers')}}</loc>
            <lastmod>2021-09-09 12:25:06</lastmod>
            <priority>4</priority>
        </url>
        <url>
            <loc>{{route('website.articles')}}</loc>
            <lastmod>2021-09-09 12:25:06</lastmod>
            <priority>5</priority>
        </url>
        <url>
            <loc>{{route('website.contact.us')}}</loc>
            <lastmod>2021-09-09 12:25:06</lastmod>
            <priority>6</priority>
        </url>
        <url>
            <loc>{{route('website.about.us')}}</loc>
            <lastmod>2021-09-09 12:25:06</lastmod>
            <priority>7</priority>
        </url>
        <url>
            <loc>{{route('student.login')}}</loc>
            <lastmod>2021-09-09 12:25:06</lastmod>
            <priority>8</priority>
        </url>
        <url>
            <loc>{{route('student.register')}}</loc>
            <lastmod>2021-09-09 12:25:06</lastmod>
            <priority>9</priority>
        </url>

        @foreach ($institutes as $institute_index => $institute)
            <url>
                <loc>{{route('website.institute' , [$institute->id, $institute->slug ])}}</loc>
                <lastmod>{{$institute->updated_at}}</lastmod>
                <priority>{{$institute_index + 10}}</priority>
            </url>
        @endforeach
        @foreach ($courses as $course_index => $course)
            <url>
                <loc>{{route('website.institute' , [$course->institute->id, $course->institute->slug , $course->slug])}}</loc>
                <lastmod>{{$course->updated_at}}</lastmod>
                <priority>{{$course_index + $institute_index + 11}}</priority>
            </url>
        @endforeach
        @foreach ($blogs as $blog_index => $blog)
            <url>
                <loc>{{route('website.article',$blog->id)}}</loc>
                <lastmod>{{$course->updated_at}}</lastmod>
                <priority>{{$blog_index + $course_index + $institute_index + 12}}</priority>
            </url>
        @endforeach
</urlset>
