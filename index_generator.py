import json

HEADER = """<!DOCTYPE html >
<html>
<head>
<meta charset="utf-8">
<title>Weird Canada</title>
<link rel="canonical" href="https://weirdcanada.com" />
</head>
"""

post_body = """<p>Well friends, our hosting provider went out of business. So instead of resurecting another behemoth WordPress site, we generated a list of every Weird Canada post since the beginning.</p>
<p>So, here they are; all 2,442 posts. A great many thanks to all the contributors, translators, volunteers, writers, and, most importantly, artists.</p>
<p>🐱🐱🐱</p>
"""

with open("wp_posts_unescaped.json") as f:
    posts = json.load(f)
    post_body += "<ul>\n"
    for post in posts[2]['data'][::-1]:
        post_body += "<li>"
        post_body += f"""{post['post_date_gmt'][0:10]}: """
        post_body += f"""<a href="posts/{post['post_name']}.html" target="_blank">{post['post_title']}</a>"""
        post_body += "</li>\n"

    post_body += "</ul>"

index_post = HEADER + "<body>\n" + post_body + "</body></html>"
print(index_post)

