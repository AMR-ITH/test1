// let close_icon = document.querySelector("#modal_container .data_container .close_icon");

$(document).ready(function () {
  function trending_videos(
    video_data,
    title,
    selector,
    top_position_forTitle,
    desc_for_video
  ) {
    //for title
    let counting = 0;
    let text_of_trending = $("<p/>");
    text_of_trending.text(title);
    text_of_trending.css({
      color: "#A8944D",
      "font-family": "IBM Plex Sans",
      "font-size": "24px",
      "font-style": "normal",
      "font-weight": "700",
      "line-height": "normal",
      position: "relative",
      "align-self": "flex-start",
      left: "1.5rem",
      top: top_position_forTitle,
    });

    let div_for_trending_videos_and_slide_icon = $("<div/>");
    div_for_trending_videos_and_slide_icon.attr(
      "class",
      " div_for_trending_videos_and_slide_icon"
    );

    let another_div_for_thumb_play_button_trending = $("<div/>");
    another_div_for_thumb_play_button_trending.attr(
      "class",
      "another_div_for_thumb_play_button_trending"
    );

    let trend_video_thumbnail = $("<img>");
    trend_video_thumbnail.attr(
      "src",
      "https://72dragons.health" + "/" + video_data[counting].thumb
    );
    trend_video_thumbnail.css({
      " width": "236.25px",
      height: "142.466px",
      "object-fit": "cover",
      position: "relative",
      top: "-1.3rem",
      transition: "all 0.5s",
    });

    let youtube_play_button_for_trending_v = $(
      '<i class="fa-solid fa-circle-play" style="color: #030202;"></i>'
    );
    youtube_play_button_for_trending_v.css({
      "z-index": "11",
      width: "84px",
      opacity: "0.7",
      position: "relative",
      top: "4rem",
      left: "7rem",

      color: "#8c8c8c",
    });
    youtube_play_button_for_trending_v.appendTo(
      another_div_for_thumb_play_button_trending
    );
    trend_video_thumbnail.appendTo(another_div_for_thumb_play_button_trending);

    // let slide_icon = $(
    //   '<i class="fa-solid fa-angle-right" style="color: #a8944d;"></i>'
    // );
    // slide_icon.css({
    //   " width": "30.797px",
    //   height: " 17.739px",
    //   position: "relative",
    //   top: "4rem",
    //   "font-size": "2rem",
    // });

    another_div_for_thumb_play_button_trending.appendTo(
      div_for_trending_videos_and_slide_icon
    );
    // slide_icon.appendTo(div_for_trending_videos_and_slide_icon);
    // slide_icon.on("click", function () {
    //   counting++;
    //   console.log(counting);
    //   if (counting > video_data.length - 1) {
    //     counting = video_data.length - 1;
    //     return;
    //   } else {
    //     $(trend_video_thumbnail).css({
    //       opacity: "0",
    //     });
    //     $(video_trending_desc).css({
    //       opacity: "0",
    //     });

    //     setTimeout(() => {
    //       trend_video_thumbnail.attr(
    //         "src",
    //         "https://72dragons.health" + "/" + video_data[counting].thumb
    //       );
    //       video_trending_desc.text(video_data[counting].video_des);
    //       $(trend_video_thumbnail).css({
    //         opacity: "1",
    //       });
    //       $(video_trending_desc).css({
    //         opacity: "1",
    //       });
    //     }, 500);
    //   }
    // });

    //circle for sign
    let div_for_circle_sign_highlight = $("<div/>");
    div_for_circle_sign_highlight.attr(
      "class",
      "div_for_circle_sign_highlight"
    );
    div_for_circle_sign_highlight.css({
      display: "flex",
      gap: "1rem",
      "align-self": "center",
    });

    for (let i = 0; i < 4; i++) {
      let icon_circle = $("<div/>");
      icon_circle.attr("class", "icon_circle_for_highlight");
      icon_circle.css({
        width: "10px",
        height: "10px",

        border: "2px solid #A8944D",
        "border-radius": "25px",
        position: "relative",
        bottom: "3rem",
      });
      icon_circle.appendTo(div_for_circle_sign_highlight);
    }
    div_for_circle_sign_highlight.appendTo(
      div_for_trending_videos_and_slide_icon
    );

    //circle ends here.

    //button start here.
    let div_cotainer_for_button = $("<div/>");
    div_cotainer_for_button.attr("class", "div_container_for_button");
    let button_prev = $("<button/>");
    button_prev.attr("class", "button_prev");
    button_prev.css({
      display: "flex",
      width: "108px",
      height: "33.3px",
      padding: "9px 18px",
      "justify-content": "center",
      "align-items": "center",
      gap: "9px",
      "flex-shrink": "0",
      "border-radius": "4.5px",
      background: "#A8944D",
      transition: "all 0.5s",
      // display: "flex",
      // width: "108px",
      // height: "33.3px",
      // padding: "9px 18px",
      // "justify-content": "center",
      // "align-items": "center",
      // gap: "9px",
      // "flex-shrink": "0",
      // "border-radius": "3.6px",
      // background: "#B1AFAA",
    });
    let span_prev_text = $("<span/>");
    span_prev_text.text("Previous");
    span_prev_text.css({
      color: "#672A28",
      "font-family": "Montserrat",
      // "font-size": 10.8px;
      "font-style": "normal",
      "font-weight": "700",
      "line-height": "normal",
      transition: "all 0.5s",
      // color: "#978180",
      // "font-family": "Montserrat",
      // "font-size": "8.64px",
      // "font-style": "normal",
      // "font-weight": "700",
      // "line-height": "normal",
    });
    let span_prev_icon = $(
      '<i class="fa-solid fa-angle-left" style="color: #978180;"></i>'
    );
    span_prev_icon.appendTo(button_prev);
    span_prev_text.appendTo(button_prev);

    //next button items
    let button_next = $("<button/>");
    button_next.attr("class", "button_next");
    button_next.css({
      display: "flex",
      width: "108px",
      height: "33.3px",
      padding: "9px 18px",
      "justify-content": "center",
      "align-items": "center",
      gap: "9px",
      "flex-shrink": "0",
      "border-radius": "4.5px",
      background: "#A8944D",
      transition: "all 0.5s",
    });
    let span_next = $("<span/>");
    span_next.text("Next");
    span_next.css({
      color: "#672A28",
      "font-family": "Montserrat",
      // "font-size": 10.8px;
      "font-style": "normal",
      "font-weight": "700",
      "line-height": "normal",
      transition: "all 0.5s",
    });
    let span_next_icon = $(
      '<i class="fa-solid fa-angle-right" style="color: #672A28;"></i>'
    );
    span_next.appendTo(button_next);
    span_next_icon.appendTo(button_next);

    button_next
      .on("mouseover", function () {
        $(this).css({
          background: "#822826",
          // color: "#A8944D",
        });
        span_next.css({
          color: "#A8944D",
        });
        span_next_icon.css({
          color: "#A8944D",
        });
      })
      .on("mouseleave", function () {
        $(this).css({
          background: "#A8944D",
          // color: "#A8944D",
        });
        span_next.css({
          color: "#822826",
        });
        span_next_icon.css({
          color: "#822826",
        });
      });

    button_prev
      .on("mouseover", function () {
        $(this).css({
          background: "#822826",
          // color: "#A8944D",
        });
        span_prev_text.css({
          color: "#A8944D",
        });
        span_prev_icon.css({
          color: "#A8944D",
        });
      })
      .on("mouseleave", function () {
        $(this).css({
          background: "#A8944D",
          // color: "#A8944D",
        });
        span_prev_text.css({
          color: "#822826",
        });
        span_prev_icon.css({
          color: "#822826",
        });
      });

    button_prev.appendTo(div_cotainer_for_button);
    button_next.appendTo(div_cotainer_for_button);
    div_cotainer_for_button.appendTo(div_for_trending_videos_and_slide_icon);

    //click evet onbutton

    button_next.on("click", function () {
      if (counting >= 3) {
        counting = 3;
        return;
      } else {
        $(trend_video_thumbnail).css({
          opacity: "0",
        });
        $(video_trending_desc).css({
          opacity: "0",
        });

        setTimeout(() => {
          trend_video_thumbnail.attr(
            "src",
            "https://72dragons.health" + "/" + video_data[counting].thumb
          );
          video_trending_desc.text(video_data[counting].video_des);
          $(trend_video_thumbnail).css({
            opacity: "1",
          });
          $(video_trending_desc).css({
            opacity: "1",
          });
        }, 500);
      }
      counting++;
      console.log(counting);

      if (counting === 1) {
        $(".icon_circle_for_highlight:nth-child(2)").css({
          background: "#A8944D",
        });
        $(".icon_circle_for_highlight:nth-child(1)").css({
          background: "rgba(344,344,333,0)",
        });
      }
      if (counting === 2) {
        $(".icon_circle_for_highlight:nth-child(3)").css({
          background: "#A8944D",
        });
        $(".icon_circle_for_highlight:nth-child(2)").css({
          background: "rgba(344,344,333,0)",
        });
        $(".icon_circle_for_highlight:nth-child(1)").css({
          background: "rgba(344,344,333,0)",
        });
      }
      if (counting === 3) {
        $(".icon_circle_for_highlight:nth-child(4)").css({
          background: "#A8944D",
        });
        $(".icon_circle_for_highlight:nth-child(3)").css({
          background: "rgba(344,344,333,0)",
        });
        $(".icon_circle_for_highlight:nth-child(2)").css({
          background: "rgba(344,344,333,0)",
        });
        $(".icon_circle_for_highlight:nth-child(1)").css({
          background: "rgba(344,344,333,0)",
        });
      }
    });

    //go prev
    button_prev.on("click", function () {
      console.log(counting);
      if (counting <= 0) {
        counting = 0;
        return;
      } else {
        $(trend_video_thumbnail).css({
          opacity: "0",
        });
        $(video_trending_desc).css({
          opacity: "0",
        });

        setTimeout(() => {
          trend_video_thumbnail.attr(
            "src",
            "https://72dragons.health" + "/" + video_data[counting].thumb
          );
          video_trending_desc.text(video_data[counting].video_des);
          $(trend_video_thumbnail).css({
            opacity: "1",
          });
          $(video_trending_desc).css({
            opacity: "1",
          });
        }, 500);
      }

      counting--;
      if (counting === 2) {
        $(".icon_circle_for_highlight:nth-child(4)").css({
          background: "rgba(344,344,333,0)",
        });
        $(".icon_circle_for_highlight:nth-child(3)").css({
          background: "#A8944D",
        });
        $(".icon_circle_for_highlight:nth-child(2)").css({
          background: "rgba(344,344,333,0)",
        });
        $(".icon_circle_for_highlight:nth-child(1)").css({
          background: "rgba(344,344,333,0)",
        });
      }
      if (counting === 1) {
        $(".icon_circle_for_highlight:nth-child(4)").css({
          background: "rgba(344,344,333,0)",
        });
        $(".icon_circle_for_highlight:nth-child(3)").css({
          background: "rgba(344,344,333,0)",
        });
        $(".icon_circle_for_highlight:nth-child(2)").css({
          background: "#A8944D",
        });
        $(".icon_circle_for_highlight:nth-child(1)").css({
          background: "rgba(344,344,333,0)",
        });
        // button_prev.attr("disabled", "false");
        // button_prev.css({
        //   display: "flex",
        //   width: "108px",
        //   height: "33.3px",
        //   padding: "9px 18px",
        //   "justify-content": "center",
        //   "align-items": "center",
        //   gap: "9px",
        //   "flex-shrink": "0",
        //   "border-radius": "4.5px",
        //   background: "#A8944D",
        // });
      }
      if (counting === 0) {
        $(".icon_circle_for_highlight:nth-child(4)").css({
          background: "rgba(344,344,333,0)",
        });
        $(".icon_circle_for_highlight:nth-child(3)").css({
          background: "rgba(344,344,333,0)",
        });
        $(".icon_circle_for_highlight:nth-child(2)").css({
          background: "rgba(344,344,333,0)",
        });
        $(".icon_circle_for_highlight:nth-child(1)").css({
          background: "#A8944D",
        });
        // button_prev.attr("disabled", "true");
        // button_prev.css({
        //   display: "flex",
        //   width: "108px",
        //   height: "33.3px",
        //   padding: "9px 18px",
        //   "justify-content": "center",
        //   "align-items": "center",
        //   gap: "9px",
        //   "flex-shrink": "0",
        //   "border-radius": "3.6px",
        //   background: "#B1AFAA",
        // });
      }
    });

    //buttons end here

    let video_trending_desc = $("<p/>");
    video_trending_desc.text(video_data[counting].video_des);
    video_trending_desc.css({
      color: "#A8944D",
      "font-family": " Montserrat",
      "font-size": "12px",
      "font-style": " normal",
      "font-weight": "500",
      "line-height": " normal",
      position: "relative",
      bottom: "1rem",
      "white-space": "normal",
      "word-wrap": "break-word",
      transition: "all 0.5s",
    });
    video_trending_desc.appendTo(another_div_for_thumb_play_button_trending);

    text_of_trending.appendTo(selector);
    div_for_trending_videos_and_slide_icon.appendTo(selector);
  }

  //for trending and recommended
  $.ajax({
    url: "/php/api/72_dragons_health_at_apha_video_api.php",
    method: "GET",
    data: {
      trending: true,
    },
    dataType: "json",
    success: function (data) {
      console.log(data.trendingVideos);
      let video_data = data.trendingVideos;
      // daily videos thumbnail and play icon

      //trending videos

      trending_videos(video_data, "Most Viewed", ".trending_container", "1rem");
      //end of trending videos
      // trending_videos(
      //   video_data,
      //   "Recommended",
      //   ".recommended_container",
      //   "0rem"
      // );
    },
    error: function (e) {},
  });

  //for daily videos
  $.ajax({
    url: "/php/api/72_dragons_health_at_apha_video_api.php",
    method: "GET",
    data: {
      daily: true,
    },
    dataType: "json",
    success: function (data) {
      console.log("dailu", data);
      let video_data = data.recentVideos;
      // daily videos thumbnail and play icon
      if (video_data.length > 0) {
        let div_for_video_thumb_daily = $("<div/>");
        div_for_video_thumb_daily.attr(
          "class",
          "daily_video_and_thumb_container"
        );

        let video_daily = $("<video>");
        video_daily.attr("controls", true);
        video_daily.attr(
          "src",
          "https://72dragons.health" + "/" + video_data[0].video_loc
        );
        video_daily.attr(
          "poster",
          "https://72dragons.health" + "/" + video_data[0].thumb
        );
        video_daily.css({
          width: "830px",
          height: "500px",
          position: "relative",
          right: "-1.5rem",
          "object-fit": "cover",
          "z-index": "10",
        });

        video_daily.appendTo(div_for_video_thumb_daily);
        div_for_video_thumb_daily.appendTo(".daily_video_container");

        // profile icon and desc
        let div_for_profile_icon = $("<div/>");
        div_for_profile_icon.attr("class", "profile_icon_cotainer");
        let profile_icon = $("<img>");
        profile_icon.attr("alt", "img_thumbnail");
        profile_icon.attr("src", "/view/icons/LOGO 72 Dragons Health 2.png");
        profile_icon.css({
          width: "63px",
          height: "63px",
          "border-radius": "50%",
          "object-fit": "cover",
        });

        let div_for_daily_profile_info = $("<div/>");
        div_for_daily_profile_info.attr("class", "div_for_daily_profile_info");
        let desc_for_profile_for_daily = $("<p/>");
        desc_for_profile_for_daily.text(video_data[0].video_des);
        desc_for_profile_for_daily.css({
          color: "#A8944D",
          "font-family": "IBM Plex Sans",
          "font-size": "24.796px",
          "font-style": "normal",
          "font-weight": "600",
        });

        let name_of_profile_icon = $("<p/>");
        name_of_profile_icon.text("");
        name_of_profile_icon.css({
          position: "relative",
          top: "-1rem",
        });

        desc_for_profile_for_daily.appendTo(div_for_daily_profile_info);
        name_of_profile_icon.appendTo(div_for_daily_profile_info);

        div_for_daily_profile_info.css({
          display: "flex",
          "flex-direction": "column",
          "justify-content": "center",
          gap: "1rem",
          color: "white",
        });

        profile_icon.appendTo(div_for_profile_icon);
        div_for_daily_profile_info.appendTo(div_for_profile_icon);

        div_for_profile_icon.css({
          display: "flex",
          gap: "1rem",
          position: "relative",
          left: "3rem",
          top: "1rem",
        });
        div_for_profile_icon.appendTo(".daily_video_container");
      } else {
        let no_video_text = $("<p>");
        no_video_text.text("there is no videos");
        no_video_text.css({
          color: "yellow",
        });
        no_video_text.appendTo(".daily_video_container");
      }
    },
    error: function (e) {},
  });
  //new ajax
  $.ajax({
    url: "/php/api/72_dragons_health_at_apha_video_api.php",
    method: "GET",
    dataType: "json",
    success: function (data) {
      console.log(data);
      let obj = {
        thumb: "hello.png",
        video_des: "hiii",
        video_loc: "jgjh.mp4",
      };
      // let newArray = Array(100).fill(obj);
      // console.log(newArray);

      let video_data = data.videos;
      let start = 0;
      let size = 24;
      let isLoading = false; // Flag to prevent multiple "There are more videos" messages
      let noMoreVideosDisplayed = false; // Flag to track if "There is no more video" message has been displayed

      //daily videos

      //end of daily

      // //trending videos
      // //for title
      // let text_of_trending = $('<p/>');
      // text_of_trending.text("Trending");
      // text_of_trending.css({
      //     "color": "#A8944D",
      //     "font-family": "IBM Plex Sans",
      //     "font-size": "24px",
      //     "font-style": "normal",
      //     "font-weight": "700",
      //     "line-height": "normal", "position": "relative", "top": "1rem",
      // })

      // let div_for_trending_videos_and_slide_icon = $('<div/>');
      // div_for_trending_videos_and_slide_icon.attr('class', " div_for_trending_videos_and_slide_icon");

      // let another_div_for_thumb_play_button_trending = $('<div/>');
      // another_div_for_thumb_play_button_trending.attr('class', 'another_div_for_thumb_play_button_trending');

      // let trend_video_thumbnail = $('<img>');
      // trend_video_thumbnail.attr('src', "https://72dragons.health" + "/" + video_data[1].thumb);
      // trend_video_thumbnail.css({
      //     " width": "236.25px",
      //     "height": "142.466px",
      //     "object-fit": "cover", "position": "relative", "top": "-1.3rem"
      // })

      // let youtube_play_button_for_trending_v = $('<i class="fa-solid fa-circle-play" style="color: #030202;"></i>');
      // youtube_play_button_for_trending_v.css({
      //     "z-index": "11",
      //     "width": "84px",
      //     "opacity": "0.7",
      //     "position": "relative",
      //     "top": "4rem", "left": "7rem",

      //     "color": "#8c8c8c",

      // })
      // youtube_play_button_for_trending_v.appendTo(another_div_for_thumb_play_button_trending);
      // trend_video_thumbnail.appendTo(another_div_for_thumb_play_button_trending);

      // let slide_icon = $('<i class="fa-solid fa-angle-right" style="color: #a8944d;"></i>');
      // slide_icon.css({
      //     " width": "30.797px",
      //     "height": " 17.739px",
      //     "position": "relative", "top": "4rem"
      // })

      // another_div_for_thumb_play_button_trending.appendTo(div_for_trending_videos_and_slide_icon);
      // slide_icon.appendTo(div_for_trending_videos_and_slide_icon);

      // let video_trending_desc = $('<p/>');
      // video_trending_desc.text("hffffgjfjhjhffffhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhfffffffffffffgjhgj");
      // video_trending_desc.css({
      //     "color": "#A8944D",
      //     "font-family": " Montserrat",
      //     "font-size": "12px",
      //     "font-style": " normal",
      //     "font-weight": "500",
      //     "line-height": " normal", "position": "relative", "bottom": "1rem", "white-space": "normal",
      //     "word-wrap": "break-word"
      // })
      // video_trending_desc.appendTo(another_div_for_thumb_play_button_trending);

      // text_of_trending.appendTo('.trending_container');
      // div_for_trending_videos_and_slide_icon.appendTo('.trending_container');

      //end of trending

      function* generator() {
        while (start < video_data.length) {
          let paragraphContainer = $("<div>");
          paragraphContainer.attr("class", "video_details_cont");

          for (let i = start; i < size && i < video_data.length; i++) {
            //parent element
            let div_new = $("<div/>");
            div_new.attr("class", "parent_container_of_every_see_more_video");
            div_new.css({
              display: "flex",
              "flex-direction": "column",
              "align-items": "center",
              gap: "1.5rem",
            });

            //sub container and data
            let div_for_video_thumb = $("<div/>");
            div_for_video_thumb.attr("class", "video_and_thumb_container");
            let thumb_img = $('<img class="img_thumb">');

            let youtube_play_button = $(
              '<i class="fa-solid fa-circle-play" style="color: #030202;"></i>'
            );
            thumb_img.attr(
              "src",
              "https://72dragons.health" + "/" + video_data[i].thumb
            );
            thumb_img.attr("alt", "thumbnail");
            thumb_img.css({
              width: "412px",
              height: "248px",
              bottom: "2px",
              "object-fit": "cover",
              "z-index": "10",
            });

            youtube_play_button.css({
              "z-index": "11",
              width: "84px",
              height: "84px",
              opacity: "0.7",
              "align-self": "center",
              position: "relative",
              left: "3rem",
              top: "13rem",
              color: "#8c8c8c",
            });
            youtube_play_button.appendTo(div_for_video_thumb);

            thumb_img.appendTo(div_for_video_thumb);
            // video.appendTo(div_for_video_thumb);

            div_for_video_thumb.appendTo(div_new);

            // modal creation
            div_for_video_thumb.on("click", function () {
              //                             <div id="modal_container">
              //     <div class="overlap"></div>
              //     <div class="data_container">
              //         <div class="close_icon" onclick="closeModal()">
              //             <i class="fa fa-times" aria-hidden="true"></i>
              //         </div>
              //     </div>
              // </div>
              let modal_container = $("<div/>");
              modal_container.attr("id", "modal_container");

              let overlay_container = $("<div/>");
              overlay_container.attr("class", "overlap");
              overlay_container.appendTo(modal_container);

              let data_container = $("<div/>");
              data_container.attr("class", "data_container");

              let close_icon_cont = $("<div/>");
              close_icon_cont.attr("class", "close_icon");

              let div_for_popup_video_and_title = $("<div/>");
              div_for_popup_video_and_title.attr(
                "class",
                "popup_video_title_container"
              );

              let i_cross_icon = $(
                '<i class="fa fa-times" aria-hidden="true"></i>'
              );
              i_cross_icon.appendTo(close_icon_cont);

              close_icon_cont.appendTo(data_container);
              data_container.appendTo(modal_container);

              modal_container.appendTo("body");

              //video tag
              let video = $("<video>");

              video.attr("controls", true);
              video.attr(
                "src",
                "https://72dragons.health" + "/" + video_data[i].video_loc
              );
              modal_container.css({
                display: "block",
              });

              // video.appendTo(data_container);
              video.appendTo(div_for_popup_video_and_title);
              div_for_popup_video_and_title.appendTo(data_container);

              //for title and date
              let one_for_title_in_popup = $("<p/>");
              let one_for_date_in_poppu = $("<p/>");
              let one_div_for_title_andDate_popup = $("<div/>");
              one_for_title_in_popup
                .text("Title: " + video_data[i].video_des)
                .css({
                  transition: "all 0.5s",
                  "font-family": "IBM Plex Sans",
                })
                .on("mouseover", function () {
                  $(this).css({
                    color: "white",
                    transform: "Scale(1.1)",
                  });
                })
                .on("mouseleave", function () {
                  $(this).css({
                    color: "#ad9440",
                    transform: "Scale(1)",
                  });
                });

              let date_1 = parseInt(video_data[i].day);
              let formattedDate = new Date(date_1 * 1000).toLocaleString();
              let newFormattedDate = formattedDate.split(",").shift();
              one_for_date_in_poppu
                .text("Upload Date" + ": " + newFormattedDate)
                .css({
                  transition: "all 0.5s",
                  "font-family": "IBM Plex Sans",
                })
                .on("mouseover", function () {
                  $(this).css({
                    color: "white",
                    transform: "Scale(1.1)",
                  });
                })
                .on("mouseleave", function () {
                  $(this).css({
                    color: "#ad9440",
                    transform: "Scale(1)",
                  });
                });
              one_for_date_in_poppu.appendTo(one_div_for_title_andDate_popup);
              one_for_title_in_popup.appendTo(one_div_for_title_andDate_popup);
              one_div_for_title_andDate_popup.css({
                color: "#ad9440",
                "font-weight": "bolder",
                display: "flex",
                "align-items": "center",
                "flex-direction": "column-reverse",
                gap: "1rem",
              });
              one_div_for_title_andDate_popup.appendTo(data_container);

              $(close_icon_cont).on("click", function () {
                $(data_container).css({
                  "animation-name": "modalAnimOne",
                });
                setTimeout(() => {
                  $(modal_container).css({
                    display: "none",
                  });
                  div_for_popup_video_and_title.find("video").eq(0).remove();
                }, 1000);
              });
            });

            let div_for_video_desc = $("<div/>");
            div_for_video_desc.attr("class", "video_desc_icon");
            let icon_for_video_desc = $('<img class="icon_video_desc">');
            icon_for_video_desc.attr(
              "src",
              "/view/icons/LOGO 72 Dragons Health 2.png"
            );
            icon_for_video_desc.css({
              width: "63px",
              height: "63px",
              "border-radius": "50%",
              "object-fit": "cover",
            });
            icon_for_video_desc.appendTo(div_for_video_desc);
            let span_for_desc = $("<span/>");
            span_for_desc.attr("class", "video_description");
            span_for_desc.text(video_data[i].video_des);
            span_for_desc.css({
              color: "#A8944D",
              "font-family": "IBM Plex Sans",
              "font-weight": "600",
              width: "19rem",
            });
            span_for_desc.appendTo(div_for_video_desc);
            div_for_video_desc.appendTo(div_new);
            div_for_video_desc.css({
              display: "flex",
              gap: "1rem",
              "justify-content": "flex-start",
            });
            paragraphContainer.append(div_new);
          }
          $(".video_data_container").append(paragraphContainer);
          start = size;
          size += 24;
          yield size;
        }
      }

      let tt = generator();
      tt.next();
      let count = 0;
      // $(".video_data_container").scroll(function () {
      //     if (
      //         !isLoading &&
      //         $(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight
      //     )
      $(document).scroll(function () {
        if (
          $(window).scrollTop() + $(window).height() >=
            $(document).height() - 1 &&
          count < 1
        ) {
          isLoading = true;

          console.log(count);
          let element = $("<p>").text("Loading More Videos...").css({
            color: " #ad9440",
            "font-weight": "bolder",
            "font-size": "1.5rem",
            position: "fixed",
            left: "40rem",
            bottom: "5rem",
            "text-transform": "uppercase",
            "z-index": "200",
          });
          $(".video_details_cont").append(element);
          //console.log(isLoading);
          // Hide the message after 3 seconds (adjust the time as needed)

          setTimeout(function () {
            $(".video_details_cont").find("p").remove();

            isLoading = false;

            if (tt.next().done === true && !noMoreVideosDisplayed) {
              count = 1;
              let noMoreVideosElement = $("<p>").text("No More Videos").css({
                color: " #ad9440",
                "font-weight": "bolder",
                "font-size": "1.5rem",
                position: "relative",
                left: "38rem",
                bottom: "4rem",

                "text-transform": "uppercase",
                "z-index": "1",
              });
              $(".video_details_cont").append(noMoreVideosElement);
              noMoreVideosDisplayed = true;
            }
          }, 3000); // 3 seconds
        }
      });
    },
    error: function (e) {
      // Handle errors here
    },
  });

  //search system

  // $("#go_out_for_search").on("click", function () {
  //   let value_of_search = $(".data_search_container input").val();
  //   console.log(value_of_search);
  //   // $(".data_search_container input").val("");
  //   //
  //   // if (value_of_search !== "") {
  //   //   $("#video_gallery_container").find(".daily_video_container").hide();
  //   //   //trendingAndRecommendedContainer
  //   //   $("#video_gallery_container")
  //   //     .find(".trendingAndRecommendedContainer")
  //   //     .hide();

  //   //   $("#video_gallery_container").find(".video_title_container").css({
  //   //     "justify-content": "flex-end",
  //   //   });
  //   // } else {
  //   //   $("#video_gallery_container").find(".daily_video_container").show();
  //   //   $("#video_gallery_container")
  //   //     .find(".trendingAndRecommendedContainer")
  //   //     .show();
  //   //   $("#video_gallery_container").find(".video_title_container").css({
  //   //     "justify-content": "space-between",
  //   //   });
  //   // }
  //   //.parent_container_of_every_see_more_video , video_details_cont

  //   $(".video_details_cont")
  //     .find(".parent_container_of_every_see_more_video")
  //     .each((idx, ele) => {
  //       let this_cont = $(ele);
  //       let video_desc_forSearch = $(ele)
  //         .find(".video_desc_icon")
  //         .find(".video_description")
  //         .text()
  //         .toLowerCase();
  //       console.log(video_desc_forSearch);
  //       if (!value_of_search.toLowerCase().includes(video_desc_forSearch)) {
  //         this_cont.hide();
  //       }
  //     });
  // });

  $("#go_out_for_search").on("click", function () {
    let value_of_search = $(".data_search_container input").val().toLowerCase();

    //hiding trending,daily,and recommended videos
    if (value_of_search !== "") {
      $("#video_gallery_container").find(".daily_video_container").hide();
      //trendingAndRecommendedContainer
      $("#video_gallery_container")
        .find(".trendingAndRecommendedContainer")
        .hide();

      $("#video_gallery_container").find(".video_title_container").css({
        "justify-content": "flex-end",
      });
    } else {
      $("#video_gallery_container").find(".daily_video_container").show();
      $("#video_gallery_container")
        .find(".trendingAndRecommendedContainer")
        .show();
      $("#video_gallery_container").find(".video_title_container").css({
        "justify-content": "space-between",
      });
    }

    // Show all video containers initially
    $(".video_details_cont")
      .find(".parent_container_of_every_see_more_video")
      .show();

    // Check each video's description and hide those that do not match the search query
    $(".video_details_cont")
      .find(".parent_container_of_every_see_more_video")
      .each((idx, ele) => {
        let this_cont = $(ele);
        let video_desc_forSearch = $(ele)
          .find(".video_desc_icon")
          .find(".video_description")
          .text()
          .toLowerCase();
        console.log(video_desc_forSearch);
        if (!video_desc_forSearch.includes(value_of_search)) {
          this_cont.hide();
        }
      });
  });
});
