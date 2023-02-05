import React, { useEffect, useState } from "react";
import { useLocation } from "react-router-dom";

export default function Details() {

    const location = useLocation()
    const [item] = useState(location.state.item)
    const [year, setYear] = useState(location.state.item)
    const [month, setMonth] = useState(location.state.item)
    const [day, setDay] = useState(location.state.item)
    const [blogImageUrl] = useState(
        "https://d2t5292uahafuy.cloudfront.net/public"
    );

    useEffect(() =>{
        setYear(new Date(item.created_at).getFullYear());
        setMonth(new Date(item.created_at).getMonth() + 1);
        setDay(new Date(item.created_at).getDate());
    })
    const data = item.description;
    useEffect(() => {
        window.scrollTo(0, 0);
      }, []);
    return (
        <>
            <div className="wrapper">
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
                    {/* <img
                        src="/img/blog/new-blog-1.png"
                        alt="blog banner image"
                        className="banner-image"
                    /> */}
                </div>
                <div className="blog-details-rich-text">
                    <div
                        className="blog-text text-justify"
                        dangerouslySetInnerHTML={{ __html: item.description }}
                    />
                </div>
                
            </div>
        </>
    );
}
