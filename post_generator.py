import json

def header(post):
    post_name = post['post_name']
    post_link = f"https://weirdcanada.com/posts/{post_name}"
    header = f"""<!DOCTYPE html >
<html>
<head>
<meta charset="utf-8">
<title>{post['post_title']}</title>
<link rel="canonical" href="{post_link}" />
</head>
"""
    return header

POST_FOOTER = "</html>"

def body(post):
    body = f"""<body>
{post['post_content']}
</body>
</html>"""
    return body

def post_html(post):
    return header(post) + body(post) + POST_FOOTER

def post_filename(post):
    return post['post_name'] + ".html"

def write_post(post):
    with open("posts/" + post_filename(post), 'w') as p:
        p.write(post_html(post))

with open("wp_posts_unescaped.json") as f:
    posts = json.load(f)
    for post in posts[2]['data']:
        write_post(post)
