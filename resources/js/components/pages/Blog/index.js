import React, { useEffect, useRef, useState } from "react";
import Pagination from "@mui/material/Pagination";
import axios from "axios";
import { useNavigate } from "react-router-dom";
import Skeleton, { SkeletonTheme } from "react-loading-skeleton";
import 'react-loading-skeleton/dist/skeleton.css'
const Blog = () => {
    const [URL, setUrl] = useState("beeda-frontend/");
    const [blogImageUrl] = useState(
        "https://d2t5292uahafuy.cloudfront.net/public"
    );
    const [totalPage, setTotalPage] = useState();
    const [totalPost, setTotalPost] = useState([]);
    const [newPost, setNewPost] = useState([]);
    const [isLoading,setLoading]=useState(false)
    const navigate = useNavigate()
    useEffect(() => {
        axios
            .get("https://beeda.com/api/all-blogs?per_page=12&page=1")
            .then((res) => {
                setTotalPage(res.data.posts.last_page);
                setTotalPost(res.data.posts.data);
                setNewPost(res.data.posts.data.slice(-2));
            });
            window.scrollTo(0, 0)
    }, []);
    function nextPage(event, value) {
        setLoading(true);
        axios
            .get(`https://beeda.com/api/all-blogs?per_page=12&page=${value}`)
            .then((res) => {
                setTotalPage(res.data.posts.last_page);
                setTotalPost(res.data.posts.data);
                setLoading(false);
            });
    }
    const goDetails = (item) =>{
        navigate(`/blogs-details`, {
            state: {
                item
            }
        });
    }
    useEffect(() => {
        setLoading(true);
        nextPage();
      }, []);
   
    return (
        <>
            {/* <img
                src="/img/blog/Group 1000003318.png"
                alt=""
                className="blog-vector-left"
            /> */}

            <div className="blog-banner">
                <img
                    src="/img/banner-side-snap-1.png"
                    alt="banner-side-snap"
                    className="banner-side-snap-1"
                />
                <div className="wrapper">
                    <div className="d-flex align-items-center">
                        <div className="blog-banner-left">
                            <div className="blogHeadLine">
                                <div>
                                    <span
                                        className={`aboutSubHeadLine position-relative`}
                                    >
                                        Blogs
                                        <img
                                            src="/img/Vector.png"
                                            alt="vector"
                                            className="VectorImg"
                                        />
                                    </span>
                                </div>
                            </div>
                            <p>
                            Read & Learn More About Beeda
                            </p>
                        </div>

                        <div className="blog-banner-right">
                            <img
                                src="/img/blog/hero-banner-img.png"
                                alt="Contact us"
                                className="blogBannerImg"
                            />
                        </div>
                    </div>
                </div>
            </div>
            
            <div className="wrapper">
                <div id="blog-new">
                    <h3>New Blogs</h3>
                    <div className="blog-underline"></div>

                    {newPost.length === 0 ?  <>
                      <SkeletonTheme>
                      <div>
                          <Skeleton count={10} height={`100%`} width={`100%`}></Skeleton>
                      </div>
                      </SkeletonTheme>
                    </>:     
                    newPost.map((item, i) => {
                        console.log(newPost);
                        let year = new Date(item.created_at).getFullYear();
                        let month = new Date(item.created_at).getMonth() + 1;
                        let day = new Date(item.created_at).getDate();
                        return (
                            i === 0 && (
                                <>
                                    <div className="row">
                                        <div className="col-sm-6 pr-sm-0 d-flex ">
                                            <img
                                                src={`${blogImageUrl}/${item.img.file_name}`}
                                                className="card-img-top"
                                                alt="blog-card-img"
                                            />
                                        </div>
                                        <div className="col-sm-6 pl-sm-0 ">
                                            <div className="card"  style={{
                                                cursor: 'pointer',
                                                }}  onClick={() => goDetails(item)}>
                                                <div className="card-body d-flex flex-column p-2 p-md-5 justify-content-center">
                                                    <h5 className="card-title">
                                                        {item.title}
                                                    </h5>
                                                    <div className="blog-auth-details d-flex flex-wrap justify-content-between mb-3">
                                                        <div className="author">
                                                            by: {item.user.name}
                                                        </div>
                                                        <div className="date">
                                                            (
                                                            {`${
                                                                day < 10
                                                                    ? "0" + day
                                                                    : day
                                                            }/${
                                                                month < 10
                                                                    ? "0" +
                                                                      month
                                                                    : month
                                                            }/${year}`}
                                                            )
                                                        </div>
                                                    </div>
                                                    <p className="card-text" dangerouslySetInnerHTML={{ __html: item.short_description }}>
                                                    </p>

                                                    <div
                                                        style={{
                                                            cursor: 'pointer',
                                                            }}
                                                        onClick={() => goDetails(item)}
                                                        className="text-white ml-auto"
                                                    >
                                                        Read Full {">"}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </>
                            )
                        );
                    })}
                    {newPost.map((item, i) => {
                        console.log(newPost);
                        let year = new Date(item.created_at).getFullYear();
                        let month = new Date(item.created_at).getMonth() + 1;
                        let day = new Date(item.created_at).getDate();
                        return (
                            i > 0 && (
                                <>
                                    <div className="row" 
                                      >
                                        <div className="col-sm-6 pl-sm-0 d-flex order-1 order-sm-2">
                                            <img
                                                src={`${blogImageUrl}/${item.img.file_name}`}
                                                className="card-img-top"
                                                alt="blog-card-img"
                                            />
                                        </div>
                                        <div className="col-sm-6 pr-sm-0 order-2 order-sm-1">
                                            <div className="card">
                                                <div className="card-body d-flex flex-column p-2 p-md-5 justify-content-center">
                                                    <h5 className="card-title">
                                                        {item.title}
                                                    </h5>
                                                    <div className="blog-auth-details d-flex flex-wrap justify-content-between mb-3">
                                                        <div className="author">
                                                            by: {item.user.name}
                                                        </div>
                                                        <div className="date">
                                                            (
                                                            {`${
                                                                day < 10
                                                                    ? "0" + day
                                                                    : day
                                                            }/${
                                                                month < 10
                                                                    ? "0" +
                                                                      month
                                                                    : month
                                                            }/${year}`}
                                                            )
                                                        </div>
                                                    </div>
                                                    <p className="card-text" dangerouslySetInnerHTML={{ __html: item.short_description }}>
                                                    </p>

                                                    <div style={{
                                                            cursor: 'pointer',
                                                         }}
                                                        className="text-white ml-auto"
                                                        onClick={() => goDetails(item)}
                                                    >
                                                        Read Full {">"}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </>
                            )
                        );
                    })}
                </div>
            </div>

            <div className="wrapper">
                <div id="blog-body">
                    <div className="d-flex justify-content-between">
                        <h3>Blogs</h3>
                        <Pagination count={totalPage} onChange={nextPage} />
                    </div>
                    <div className="blog-underline"></div>
                    <div className="row w-100 m-0">
                        {
                        isLoading=== false &&   
                        totalPost.map((item) => {
                            let year = new Date(item.created_at).getFullYear();
                            let month =
                                new Date(item.created_at).getMonth() + 1;
                            let day = new Date(item.created_at).getDate();
                            return (
                                <>
                                    <div className="col-sm-12 col-md-6 col-lg-4 py-3">
                                        <div className="card"  style={{
                                                cursor: 'pointer',
                                                }}    onClick={() => goDetails(item)}>
                                            <img
                                                src={`${blogImageUrl}/${item.img.file_name}` || <Skeleton/>}
                                                className="card-img-top"
                                                alt="blog-card-img"
                                            />
                                            <div className="card-body">
                                                <h5 className="card-title">
                                                    {item.title || <Skeleton/>}
                                                </h5>
                                                <div className="blog-auth-details">
                                                    <div className="author">
                                                        by: {item.user.name}
                                                    </div>
                                                    <div className="date">
                                                        (
                                                        {`${
                                                            day < 10
                                                                ? "0" + day
                                                                : day
                                                        }/${
                                                            month < 10
                                                                ? "0" + month
                                                                : month
                                                        }/${year}`}
                                                        )
                                                    </div>
                                                </div>
                                                <p className="card-text" dangerouslySetInnerHTML={{ __html: item.short_description }}>
                                                </p>

                                                <div style={{
                                                cursor: 'pointer',
                                                }} onClick={() => goDetails(item)}>Read Full {">"}</div>
                                            </div>
                                        </div>
                                    </div>
                                </>
                            );
                        })}
                      
                        {
                           (
                            isLoading === true &&
                            <div className="col-12">
                            <SkeletonTheme>
                            <div className="row gx-3 gy-3 w-100">
                           <div className="col-sm-12 col-md-6 col-lg-4">
                               <Skeleton count={10}></Skeleton>
                           </div>
                           <div className="col-sm-12 col-md-6 col-lg-4">
                               <Skeleton count={10} ></Skeleton>
                           </div> 
                           <div className="col-sm-12 col-md-6 col-lg-4">
                               <Skeleton count={10}></Skeleton>
                           </div>
                            </div>
                           </SkeletonTheme>
                            </div>
                           )
                        }
                    </div>
                </div>
            </div>

            <div className="wrapper">
                <div id="blog-footer">
                    <Pagination count={totalPage} onChange={nextPage} />
                </div>
            </div>
        </>
    );
};

export default Blog;
