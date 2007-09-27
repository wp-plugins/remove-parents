=== Plugin Name ===
Contributors: 
Donate link: 
Tags: parent, category, child, permanent
Requires at least: 2.3
Tested up to: 2.3
Stable tag: 1.0

Remove Parents is a tiny plugin which remove "category" and parent categories from permalink.

== Description ==

Sometimes you don't want to show parent directories in permalink because they are not really necessary or because you know that in the future your child directory will change it's parent.

For example:
+Work in progress
--Site 1
--Site 2
+Work Finished
--Site 3

In this case Site 3 originally have been part of "Work in progress", and on job done it has been moved under "Work Finished".

So if you install this plugin your link will be transformed in this way:

domain.com/parent_category/child_directory/post_name => domain.com/child_directory/post_name
domain.com/category/parent_category => domain.com/parent_category
domain.com/category/parent_category/child_directory => domain.com/parent_category/child_directory

== Installation ==

1. Upload `remove_parents` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Set your permalink structure as "/%category%/%postname%" (or something like "/%category%/%postname%.extension")
4. Set your Category Base empty.
5. Test everything and let me know if you find some bug ;)