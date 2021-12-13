
//Frontend component
import homePublic from "../../components/frontend/home";
import blog from "../../components/frontend/blog/blog";
import blogSingle from "../../components/frontend/blog/blogSingle";
import categoryPost from "../../components/frontend/blog/categoryPost";
import contact from "../../components/frontend/contact";


export const routes= [

// Frontend route
    {
        path: '/',
        component: homePublic,
        name: 'home-public'
    },
    {
        path: '/blog',
        component: blog,
        name: 'blog'
    },
    {
        path: '/contact',
        component: contact,
        name: 'contact'
    },
    {
        path: '/blog-single/:slug',
        component: blogSingle,
        name: 'blog-single'
    },
    {
        path: '/category-post/:slug',
        component: categoryPost,
        name: 'category-post'
    },


]
