import React, { useEffect, useState } from "react";
import { Helmet } from "react-helmet";
import { useParams, useNavigate  } from "react-router-dom";
import axios from "axios";
import Skeleton, { SkeletonTheme } from "react-loading-skeleton";
import 'react-loading-skeleton/dist/skeleton.css'
export default function Details() {
    const [isLoading, setLoading] = useState(false)
    const [item, setItem] = useState()
    // const [item] = useState(location.state.item)
    const [year, setYear] = useState()
    const [month, setMonth] = useState()
    const [day, setDay] = useState()
    const [blogImageUrl] = useState(
        "https://d2t5292uahafuy.cloudfront.net/public"
    );
    const { slug } = useParams()
    const navigate = useNavigate();
    useEffect(() => {
        window.scrollTo(0, 0);
        setLoading(true);
        axios
            .get("https://beeda.com/api/allBlogs").then((res) => {
                let singlePost = res.data.posts.find(item => item.slug === slug)
                if(!singlePost){
                    navigate('/');
                }
                setItem(singlePost)
                setYear(new Date(singlePost.created_at).getFullYear());
                setMonth(new Date(singlePost.created_at).getMonth() + 1);
                setDay(new Date(singlePost.created_at).getDate());
                setLoading(false)
            });
    }, [])
    return (
        <>
            {
                isLoading === false &&
                item &&
                <div className="wrapper">
                    <Helmet>
                        <meta charSet="utf-8" />
                        <title>{item.meta_title}</title>
                        <meta name="description" content={item.meta_description}/>
                    </Helmet>
                    <div id="blog-details">
                        <h1>{item.title}</h1>
                        <div className="d-flex gap-3 author-detail">
                            <div className="author">by: {item.user.name}</div>
                            <div className="date mb-2">({`${day < 10
                                ? "0" + day
                                : day
                                }/${month < 10
                                    ? "0" +
                                    month
                                    : month
                                }/${year}`})</div>
                        </div>
                        <img
                            src={`${blogImageUrl}/${item.img.file_name}`}
                            className="card-img-top"
                            alt="blog-card-img"
                        />
                    </div>
                    <div className="blog-details-rich-text">
                        <div
                            className="blog-text text-justify mb-5"
                            dangerouslySetInnerHTML={{ __html: item.description }}
                        />
                    </div>
                </div>

            }
            {
                (
                    isLoading === true &&
                    <div>
                        <SkeletonTheme>
                            <div className="container">
                                <Skeleton count={40}></Skeleton>
                            </div>
                        </SkeletonTheme>
                    </div>
                )
            }
        </>
    );
}
