
<div> 

    <div class="w-full mt-32">
        <div class="w-full relative">
            <div class="font-bold tracking-widest">
                <h1 class="text-accent">Discord Advertising</h1>
                <h1 class="text-white text-3xl">Contact Form</h1>
                <br>
            </div>
        </div>

    </div>
    <!-- contact section -->
    <section class="section" id="contact">
        <div class="container text-center"> 
            <!-- contact form -->
            <form id="form" class="contact-form col-md-10 col-lg-8 m-auto">
                <div class="form-row">
                    <div class="font-bold tracking-widest">
                        <input type="text" size="50" class="text-white text-1xl"name="name" id="name"  placeholder="Your Name" required>                
                    </div>
                    <div class="font-bold tracking-widest">
                        <input type="email" size="50" class="text-white text-1xl" name="email" id="email" placeholder="Enter Email"requried>              
                    </div>
                    <div class="font-bold tracking-widest">
                        <textarea name="comment" id="comment" rows="1"
                        class="text-white text-1xl" size="50" placeholder="Write Something"></textarea>
                    </div>
                    <div class="form-group col-sm-12 mt-3">
                      <input type="submit" value="Send Message" id="button" class="btn btn-outline-primary rounded">
                  </div>
              </form>

</div>

        
            <script type="text/javascript"
              src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
            
            <script type="text/javascript">
              emailjs.init('qKFOvpUbKKhtE4BRT')
            </script>

<script>
    const btn = document.getElementById('button');

document.getElementById('form')
 .addEventListener('submit', function(event) {
   event.preventDefault();

   btn.value = 'Sending...';

   const serviceID = 'default_service';
   const templateID = 'template_g7cfb67';

   emailjs.sendForm(serviceID, templateID, this)
    .then(() => {
      btn.value = 'Send Email';
      alert('Sent!');
    }, (err) => {
      btn.value = 'Send Email';
      alert(JSON.stringify(err));
    });
});
  </script>

<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/64f936f1b2d3e13950ee65f6/1h9mnt8g4';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3693059889859602"
    crossorigin="anonymous">
</script>
