import React, { useEffect, useState } from "react";
import {  useParams } from "react-router-dom";
import axios from "axios";

export default function Details() {

    const [item, setItem] = useState()
    // const [item] = useState(location.state.item)
    const [year, setYear] = useState()
    const [month, setMonth] = useState()
    const [day, setDay] = useState()
    const [blogImageUrl] = useState(
        "https://d2t5292uahafuy.cloudfront.net/public"
    );
   const {slug} = useParams()

    useEffect(() =>{
        window.scrollTo(0, 0);
        console.log("loading");
        axios
        .get("https://beeda.com/api/all-blogs?per_page=12&page=1").then((res) => {
            let singlePost = res.data.posts.data.find(item => item.slug === slug)
                setItem(singlePost)
                setYear(new Date(singlePost.created_at).getFullYear());
                setMonth(new Date(singlePost.created_at).getMonth() + 1);
                setDay(new Date(singlePost.created_at).getDate());
            });
        
    }, [])
    // // const data = item.description;
    // useEffect(() => {
        
    //   }, []);
    return (
        <>
        {
            item &&  <div className="wrapper">
            <div id="blog-details">
                <h1>{item.title}</h1>
                <div className="d-flex gap-3 author-detail">
                    <div className="author">by: {item.user.name}</div>
                    <div className="date mb-2">({`${
                        day < 10
                            ? "0" + day
                            : day
                    }/${
                        month < 10
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
                    className="blog-text text-justify"
                    dangerouslySetInnerHTML={{ __html: item.description }}
                />
            </div>
            
        </div>
        }
        </>
    );
}
