<!doctype html>
<html>
<head>
  <title>Build - Survaider</title>
  <meta name="description" content="">

  {{HTML::style('vendor/css/vendor.css')}}
  {{HTML::style('dist/formbuilder.css')}}
</head>
<body>
  <div class='sb-main'></div>
  {{HTML::script('vendor/js/vendor.js')}}
  {{HTML::script('dist/formbuilder.js')}}
 

  <script>
    $(function(){
      fb = new Formbuilder({
        selector: '.sb-main',
        bootstrapData: [
          {
            "label":"What is your name?",
            "field_type":"short_text",
            "required":true,
            "field_options": {},
            "cid": "c2"
          },
          {
            "label":"Have you gone on Facebook ever before?",
            "field_type":"yes_no",
            "required":true,
            "field_options": {
                "options": [{
                    "label": "Yes",
                    "checked": false
                }, {
                    "label": "No",
                    "checked": false
                }]
            },
            "cid": "c6"
          },
          {
            "label":"What do you primarily use Facebook for?",
            "field_type":"multiple_choice",
            "required":true,
            "field_options": {
                "options": [{
                    "label": "Reading about friends",
                    "checked": false
                }, {
                    "label": "Chatting with friends",
                    "checked": false
                }, {
                    "label": "Finding new people",
                    "checked": false
                }, {
                    "label": "Reading (news, articles)",
                    "checked": false
                }, {
                    "label": "Shopping",
                    "checked": false
                }]
            },
            "cid": "c10"
          },
          {
            "label":"Is it easy to find what you are look for on Facebook?",
            "field_type":"yes_no",
            "required":true,
            "field_options": {
                "options": [{
                    "label": "Yes",
                    "checked": false
                }, {
                    "label": "No",
                    "checked": false
                }, {
                    "label": "Somewhat",
                    "checked": false
                }]
            },
            "cid": "c14"
          },
          {
            "label":"Do you think new GIFs add to your Facebook experience?",
            "field_type":"single_choice",
            "required":true,
            "field_options": {
                "options": [{
                    "label": "What GIF?",
                    "checked": false
                }, {
                    "label": "Useless!",
                    "checked": false
                }, {
                    "label": "The do, kind of.",
                    "checked": false
                }, {
                    "label": "Yes of course!",
                    "checked": false
                }]
            },
            "cid": "c18"
          },
          {
            "label":"How many stars would you give to your experience with the",
            "field_type":"group_rating",
            "required":true,
            "field_options": {
                "options": [{
                    "label": "Facebook Messenger",
                    "checked": false
                }, {
                    "label": "Facebook Search",
                    "checked": false
                }, {
                    "label": "Facebook Ads",
                    "checked": false
                }]
            },
            "cid": "c22"
          },
          {
            "label":"Do Facebook ads influence your buying decision?",
            "field_type":"single_choice",
            "required":true,
            "field_options": {
                "options": [{
                    "label": "Nope",
                    "checked": false
                }, {
                    "label": "Um kind of",
                    "checked": false
                }, {
                    "label": "Yes they do",
                    "checked": false
                }]
            },
            "cid": "c26"
          },
          {
            "label":"What Influences your buying decision, please rank them accordingly!",
            "field_type":"ranking",
            "required":true,
            "field_options": {
                "options": [{
                    "label": "Post from a friend",
                    "checked": false
                }, {
                    "label": "Facebook ad",
                    "checked": false
                }, {
                    "label": "Google ad",
                    "checked": false
                }, {
                    "label": "Sponsored post",
                    "checked": false
                }, {
                    "label": "Friend's like on a product",
                    "checked": false
                }, {
                    "label": "Celebrity post",
                    "checked": false
                }]
            },
            "cid": "c30"
          },
          {
            "label":"How would you rate your experience of Facebook on a mobile device?",
            "field_type":"rating",
            "required":true,
            "field_options": {},
            "cid": "c32"
          },
          {
            "label":"What other feature would you like to add on your Facebook mobile experience?",
            "field_type":"long_text",
            "required":true,
            "field_options": {},
            "cid": "c38"
          },
          {
            "label":"Did you enjoy this survey?",
            "field_type":"single_choice",
            "required":true,
            "field_options": {
                "options": [{
                    "label": "Yes!",
                    "checked": false
                }, {
                    "label": "No",
                    "checked": false
                }, {
                    "label": "It was okay...",
                    "checked": false
                }, {
                    "label": "I prefer normal surveys.",
                    "checked": false
                }]
            },
            "cid": "c42"
          }
        ]
      });

      fb.on('save', function(payload){
        Router.dat = JSON.parse(payload);
      })
    });

  </script>


</body>
</html>