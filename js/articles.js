$(document).ready(function () {
  function recommended_and_trending(articles_api_data, id) {
    for (let i = 0; i < 4; i++) {
      //trnsition
      $(".create_div_for_every_article").on("mouseover", function () {
        $(this)
          .find(".div_for_description")
          .find(".desc_forArticle")
          .eq(0)
          .css({
            color: "#822826",
          });
      });
      $(".create_div_for_every_article").on("mouseleave", function () {
        $(this)
          .find(".div_for_description")
          .find(".desc_forArticle")
          .eq(0)
          .css({
            color: "#A8944D",
          });
      });
      //for parent of each article api
      let create_div_for_every_article = $("<div/>");
      create_div_for_every_article.attr(
        "class",
        "create_div_for_every_article"
      );
      let link_forEveryArticle = $("<a/>");
      link_forEveryArticle.attr("target", "_blank");
      link_forEveryArticle.attr(
        "href",
        "/view/article_page.php?" + articles_api_data[i].news_title
        // "https://72dragons.health" + "/" + articles_api_data[i].pdf_url
      );
      link_forEveryArticle.on("click", function () {
        // let read_now = {
        //   pdf: "https://72dragons.health" + "/" + articles_api_data[i].pdf_url,
        //   author: articles_api_data[i].author_name,
        //   title: articles_api_data[i].news_title,
        // };
        // let new_data_stringify = JSON.stringify(read_now);
        // localStorage.setItem("highlight", new_data_stringify);
      });
      let div_for_image = $("<div/>");
      div_for_image.attr("class", "for_image");

      let div_for_description = $("<div/>");
      div_for_description.attr("class", "div_for_description");

      div_for_image.appendTo(create_div_for_every_article);
      div_for_description.appendTo(create_div_for_every_article);

      let image_for_article_thumb = $('<img alt="article_thum">');
      image_for_article_thumb.attr(
        "src",

        "https://72dragons.health" + "/" + articles_api_data[i].thumbnail
      );
      image_for_article_thumb.css({
        "object-fit": "cover",
        width: "131.165px",
        height: "66.832px",
        "border-radius": "8.675px",
        background:
          "lightgray -30.552px -121.932px / 144.855% 392.257% no-repeat",
      });
      image_for_article_thumb.appendTo(div_for_image);

      let description_of_article = $("<p/>");
      description_of_article.attr("class", "desc_forArticle");
      description_of_article.text(articles_api_data[i].news_title);
      description_of_article.css({
        color: "#A8944D",
        "font-family": "Montserrat",
        "font-size": "12px",
        "white-space": "break",
        "font-style": "normal",
        "font-weight": "700",
        "line-height": "normal",
        "align-self": "flex-start",
      });

      let author_name = $("<p/>");

      author_name.text("Written By:" + " " + articles_api_data[i].author_name);
      author_name.css({
        color: "#A8944D",
        "font-family": "Roboto",
        "font-size": "9.301px",
        "font-style": "normal",
        "font-weight": "700",
        "line-height": "normal",
        position: "relative",
        bottom: "0.5rem",
        background: "#000",
        display: "flex",
        "justify-content": "center",
        "align-items": "center",
        padding: "0.3rem",
        "align-self": "flex-start",
      });

      description_of_article.appendTo(div_for_description);
      author_name.appendTo(div_for_description);

      create_div_for_every_article.appendTo(link_forEveryArticle);
      link_forEveryArticle.appendTo(id);
    }
  }

  $.ajax({
    url: "/php/api/all_health_or_apha_articles_api.php",
    method: "GET",
    dataType: "json",
    data: {
      // trending: true,
      articletype: "apha",
    },
    success: function (data) {
      console.log(data);
      let articles_api_data = data.articles;
      recommended_and_trending(articles_api_data, "#recommended");
      recommended_and_trending(articles_api_data, "#trending");
    },
    error: function (e) {},
  });

  // today's highlight
  $.ajax({
    url: "/php/api/all_health_or_apha_articles_api.php",
    method: "GET",
    dataType: "json",
    data: {
      articletype: "apha",
    },
    success: function (data) {
      console.log(data);
      let highlight_articles = data.articles;
      let count = 0;
      let div_for_highlight = $("<div/>");
      div_for_highlight.attr("class", "div_for_highlight");

      let left_icon = $(
        '<i class="fa-solid fa-angle-left" style="color: #822826;"></i>'
      );
      left_icon.css({
        width: "19.248px",
        height: "11.087px",
        "font-size": "1.5rem",
        "border-radius": "3.349px",
        padding: "0.8rem",
        background: "linear-gradient(270deg, #A8944D 0%, #E8DDB5 106.23%)",
        display: "flex",
        "justify-content": "center",
        "align-items": "center",
        "align-self": "center",
      });

      left_icon.appendTo(div_for_highlight);

      let thumb_for_highlight = $('<img alt="thumbnail_highlight">');
      let link_url_for_highlight = $("<a/>");
      link_url_for_highlight.attr(
        "href",
        "/view/article_page.php?" + highlight_articles[0].news_title
        // "https://72dragons.health" + "/" + highlight_articles[0].pdf_url
      );
      link_url_for_highlight.on("click", function () {
        // let data_highlight_first = {
        //   pdf: "https://72dragons.health" + "/" + highlight_articles[0].pdf_url,
        //   author: highlight_articles[0].author_name,
        //   title: highlight_articles[0].news_title,
        // };
        // let new_data_stringify = JSON.stringify(data_highlight_first);
        // localStorage.setItem("highlight", new_data_stringify);
        // localStorage.setItem("highlight", new_data_stringify);
      });
      link_url_for_highlight.attr("target", "_blank");

      thumb_for_highlight.attr(
        "src",

        "https://72dragons.health" + "/" + highlight_articles[0].thumbnail
      );

      thumb_for_highlight.css({
        "object-fit": "cover",
        height: "436px",
        "border-radius": "12.879px",
        opacity: "1",
        background: "lightgray 0px -3px / 100% 100.555% no-repeat",
        transition: "all 0.5s",
      });
      thumb_for_highlight.appendTo(link_url_for_highlight);
      link_url_for_highlight.appendTo(div_for_highlight);

      let right_icon = $(
        '<i class="fa-solid fa-angle-right" style="color: #822826;"></i>'
      );
      right_icon.css({
        width: "19.248px",
        height: "11.087px",
        "font-size": "1.5rem",
        "border-radius": "3.349px",
        padding: "0.8rem",
        background: "linear-gradient(270deg, #A8944D 0%, #E8DDB5 106.23%)",
        display: "flex",
        "justify-content": "center",
        "align-items": "center",
        "align-self": "center",
      });

      right_icon.appendTo(div_for_highlight);

      div_for_highlight.appendTo("#today_highlight");

      let create_author_name_forHighlight = $("<p/>");
      create_author_name_forHighlight.attr(
        "id",
        "create_author_name_forHighlight"
      );
      create_author_name_forHighlight.text(
        "Written By:" + " " + highlight_articles[0].author_name
      );
      create_author_name_forHighlight.appendTo("#today_highlight");

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

      for (let i = 0; i < 3; i++) {
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
      div_for_circle_sign_highlight.appendTo("#today_highlight");

      //click event on button
      right_icon.on("click", function () {
        thumb_for_highlight.css({
          opacity: "0",
        });
        create_author_name_forHighlight.css({
          opacity: "0",
        });
        setTimeout(() => {
          if (count < 3) {
            create_author_name_forHighlight.text(
              "Written By:" + " " + highlight_articles[count].author_name
            );
            link_url_for_highlight.on("click", function () {
              // let highlight1 = {
              //   pdf:
              //     "https://72dragons.health" +
              //     "/" +
              //     highlight_articles[count].pdf_url,
              //   author: highlight_articles[count].author_name,
              //   title: highlight_articles[count].news_title,
              // };
              // let new_data_stringify = JSON.stringify(highlight1);
              // localStorage.setItem("highlight", new_data_stringify);
            });
            link_url_for_highlight.attr(
              "href",
              // "https://72dragons.health" +
              //   "/" +
              //   highlight_articles[count].pdf_url
              "/view/article_page.php?" + highlight_articles[count].news_title
            );

            thumb_for_highlight.attr(
              "src",
              "https://72dragons.health" +
                "/" +
                highlight_articles[count].thumbnail
            );

            thumb_for_highlight.css({
              opacity: "1",
            });
            create_author_name_forHighlight.css({
              opacity: "1",
            });
          } else {
            count = 2;
            thumb_for_highlight.css({
              opacity: "1",
            });
            create_author_name_forHighlight.css({
              opacity: "1",
            });
            return;
          }
        }, 500);
        count++;

        if (count == 1) {
          $(".icon_circle_for_highlight:nth-child(1)").css({
            "border-radius": "25px",
            border: "2px solid #A8944D",
            background: "#000",
          });
          $(".icon_circle_for_highlight:nth-child(2)").css({
            "border-radius": "25px",
            border: "2px solid #A8944D",
            background: "#D9D9D9",
          });
        }
        if (count == 2) {
          $(".icon_circle_for_highlight:nth-child(1)").css({
            "border-radius": "25px",
            border: "2px solid #A8944D",
            background: "#000",
          });
          $(".icon_circle_for_highlight:nth-child(2)").css({
            "border-radius": "25px",
            border: "2px solid #A8944D",
            background: "#000",
          });
          $(".icon_circle_for_highlight:nth-child(3)").css({
            "border-radius": "25px",
            border: "2px solid #A8944D",
            background: "#D9D9D9",
          });
        }

        console.log(count);
      });

      left_icon.on("click", function () {
        count--;
        thumb_for_highlight.css({
          opacity: "0",
        });
        create_author_name_forHighlight.css({
          opacity: "0",
        });

        setTimeout(() => {
          if (count >= 0) {
            thumb_for_highlight.attr(
              "src",
              "https://72dragons.health" +
                "/" +
                highlight_articles[count].thumbnail
            );
            link_url_for_highlight.on("click", function () {
              // let highlight1 = {
              //   pdf:
              //     "https://72dragons.health" +
              //     "/" +
              //     highlight_articles[count].pdf_url,
              //   author: highlight_articles[count].author_name,
              //   title: highlight_articles[count].news_title,
              // };
              // let new_data_stringify = JSON.stringify(highlight1);
              // localStorage.setItem("highlight", new_data_stringify);
            });
            link_url_for_highlight.attr(
              "href",
              // "https://72dragons.health" +
              //   "/" +
              //   highlight_articles[count].pdf_url
              "/view/article_page.php?" + highlight_articles[count].news_title
            );
            create_author_name_forHighlight.text(
              "Written By:" + " " + highlight_articles[count].author_name
            );
            thumb_for_highlight.css({
              opacity: "1",
            });
            create_author_name_forHighlight.css({
              opacity: "1",
            });
          } else {
            thumb_for_highlight.css({
              opacity: "1",
            });
            create_author_name_forHighlight.css({
              opacity: "1",
            });
            count = 0;

            return;
          }
        }, 500);

        console.log(count);
        if (count == 1) {
          $(".icon_circle_for_highlight:nth-child(1)").css({
            "border-radius": "25px",
            border: "2px solid #A8944D",
            background: "#000",
          });
          $(".icon_circle_for_highlight:nth-child(2)").css({
            "border-radius": "25px",
            border: "2px solid #A8944D",
            background: "#D9D9D9",
          });
          $(".icon_circle_for_highlight:nth-child(3)").css({
            "border-radius": "25px",
            border: "2px solid #A8944D",
            background: "#000",
          });
        }
        if (count == 0) {
          $(".icon_circle_for_highlight:nth-child(1)").css({
            "border-radius": "25px",
            border: "2px solid #A8944D",
            background: "#D9D9D9",
          });
          $(".icon_circle_for_highlight:nth-child(2)").css({
            "border-radius": "25px",
            border: "2px solid #A8944D",
            background: "#000",
          });
        }
      });
    },
    error: function (e) {},
  });

  $.ajax({
    url: "/php/api/all_health_or_apha_articles_api.php",
    method: "GET",
    data: {
      articletype: "apha",
    },
    dataType: "json",
    success: function (data) {
      let articles_data = data.articles;
      console.log(articles_data);
      for (let i = 0; i < articles_data.length; i++) {
        let div_for_every_api = $("<div/>");
        div_for_every_api.attr("class", "div_for_every_api");
        div_for_every_api.appendTo(".api_result_container");

        //for img and info
        let div1_for_img = $("<div/>");
        div1_for_img.attr("class", "div1_for_img");
        let div2_for_info = $("<div/>");
        div2_for_info.attr("class", "div2_for_info");

        let create_img = $('<img alt="article_img">');
        create_img.attr(
          "src",
          "https://72dragons.health" + "/" + articles_data[i].thumbnail
        );
        create_img.appendTo(div1_for_img);

        //articles info
        let create_titile_for_article = $("<p/>");
        create_titile_for_article.attr("class", "title_for_desc");
        create_titile_for_article.css({
          width: "675.313px",
          height: " 27px",
          overflow: "hidden",
          color: "#A8944D",
          "text-overflow": "ellipsis",
          "white-space": "nowrap",
          "font-family": "IBM Plex Sans",
          "font-size": "20px",
          "font-style": "normal",
          "font-weight": "700",
          "line-height": "normal",
          "letter-spacing": "0.24px",
        });
        create_titile_for_article.text(articles_data[i].news_title);
        create_titile_for_article.appendTo(div2_for_info);

        //article authorname
        let create_author_name_for_article_page = $("<p/>");
        create_author_name_for_article_page.text(
          "Written By: " + articles_data[i].author_name
        );
        create_author_name_for_article_page.attr(
          "class",
          "create_author_name_for_article_page"
        );
        create_author_name_for_article_page.css({
          color: "#A8944D",
          width: "max-content",
          padding: "0.3rem",
          "background-color": "black",
          "border-radius": "5px",
          "white-space": "nowrap",
          "font-family": "IBM Plex Sans",
          "font-size": "14px !important",
          "font-style": "normal",
          "font-weight": "700",
          "line-height": "normal",
          "letter-spacing": "0.24px",
        });
        create_author_name_for_article_page.appendTo(div2_for_info);

        //read articles link
        let read_now = $("<p/>");
        read_now.text("Read now");
        read_now.css({
          "border-radius": "6px",
          background: "linear-gradient(270deg, #A8944D 0%, #E8DDB5 106.23%)",
          width: "134.4px",
          height: "32.4px",
          color: "#822826",
          "font-family": "IBM Plex Sans",
          "font-size": "14.4px",
          "font-style": "normal",
          "font-weight": "700",
          "line-height": "normal",
          display: "flex",
          "justify-content": "center",
          "align-items": "center",
          transition: "all 0.5s",
        });
        let anchor_tag_for_pdf_link = $("<a>");
        anchor_tag_for_pdf_link.attr(
          "href",
          // "https://72dragons.health" + "/" + articles_data[i].pdf_url
          "/view/article_page.php?" + articles_data[i].news_title
        );
        anchor_tag_for_pdf_link.on("click", function () {
          // let read_now = {
          //   pdf: "https://72dragons.health" + "/" + articles_data[i].pdf_url,
          //   author: articles_data[i].author_name,
          //   title: articles_data[i].news_title,
          // };
          // let new_data_stringify = JSON.stringify(read_now);
          // localStorage.setItem("highlight", new_data_stringify);
        });
        anchor_tag_for_pdf_link.attr("target", "_blank");
        read_now.appendTo(anchor_tag_for_pdf_link);
        anchor_tag_for_pdf_link.appendTo(div2_for_info);

        div1_for_img.appendTo(div_for_every_api);
        div2_for_info.appendTo(div_for_every_api);
      }
    },
    error: function (e) {},
  });

  $("#go_out_for_search").on("click", function () {
    let value_of_search = $(".data_search_container input").val().toLowerCase();

    //hiding trending,daily,and recommended videos
    // if (value_of_search !== "") {
    //   $("#video_gallery_container").find(".daily_video_container").hide();
    //   //trendingAndRecommendedContainer
    //   $("#video_gallery_container")
    //     .find(".trendingAndRecommendedContainer")
    //     .hide();

    //   $("#video_gallery_container").find(".video_title_container").css({
    //     "justify-content": "flex-end",
    //   });
    // } else {
    //   $("#video_gallery_container").find(".daily_video_container").show();
    //   $("#video_gallery_container")
    //     .find(".trendingAndRecommendedContainer")
    //     .show();
    //   $("#video_gallery_container").find(".video_title_container").css({
    //     "justify-content": "space-between",
    //   });
    // }

    // Show all video containers initially
    $(".api_result_container").find(".div_for_every_api").show();

    // Check each video's description and hide those that do not match the search query
    $(".api_result_container")
      .find(".div_for_every_api")
      .each((idx, ele) => {
        let this_cont = $(ele);
        let video_desc_forSearch = $(ele)
          .find(".div2_for_info")
          .find(".title_for_desc")
          .text()
          .toLowerCase();
        console.log(video_desc_forSearch);
        if (!video_desc_forSearch.includes(value_of_search)) {
          this_cont.hide();
        }
      });
  });
});
