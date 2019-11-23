<template>
    <div class="wrapper">
      <nav-panel></nav-panel>
      <header id="home" class="section-wrapper">
          <headerContent></headerContent>
      </header>
      <section id="digital" class="section-wrapper">
        <digital></digital>
      </section>
      <section id="celebrities-brands" class="section-wrapper">
        <celebritiesBrands></celebritiesBrands>
      </section>
      <section id="offices" class="section-wrapper">
        <offices></offices>
      </section>
      <section id="services" class="section-wrapper">
        <services></services>
      </section>
      <section id="insta" class="section-wrapper">
          <instagram></instagram>
      </section>
      <section id="contact" class="section-wrapper">
          <contactForm></contactForm>
      </section>
    </div>
</template>
<script>
  import navPanel from './../components/nav-panel';
  import headerContent from './../components/home/header';
  import contactForm from './../components/home/contact-form';
  import digital from './../components/home/digital';
  import celebritiesBrands from './../components/home/celebrities-brands';
  import offices from './../components/home/offices';
  import services from './../components/home/services';
  import instagram from './../components/home/instagram';
  import {i18n} from './../i18n'

  export default {
    components: {
      navPanel, 
      headerContent, 
      contactForm,
      digital,
      celebritiesBrands,
      offices,
      services,
      instagram
    },
    methods: {
      getLocaleStrings() {

        const success = res => {
          for(const key in res.data.data) {
            i18n.setLocaleMessage(key, res.data.data[key]);
          }
        };

        const error = error => {
            console.log(error);
        };

        this.$http({ url: 'strings-sorted', method: 'GET'})
          .then(success)
          .catch(error);

      }
    },
     mounted() {
      this.getLocaleStrings();
    }
  };
</script>

<style scoped lang="scss">
  @import './../../sass/app';

  .wrapper {
    width: 100%;
    background-color: $blue-dark;
  }

  .section-wrapper {
    height:100vh;
  }

  #contact {
    height: 800px;
  } 

  #services {
    height: auto;
  }

  #home {
    min-height: 100vh;
    height: auto;
  }

  #insta {
    height: auto;
  }

  // Extra small devices (portrait phones, less than 576px)
    @media (max-width: 575.98px) { 
      .section-wrapper {
        width: 100%;
        height: auto;
      }

      #home {
        min-height: auto;
        height: auto;
      }

      #digital {
        height: auto;
        width: 100%;
      }

      #contact {
        height: 800px;
      }
    }

    @media (max-width: 1200px) { 
        .wrapper {
          width: 100%;
          margin: auto;
        }
    }

    // Small devices (landscape phones, 576px and up)
    @media (min-width: 576px) and (max-width: 767.98px) {
      .wrapper {
        width: 1200px;
        height: auto;
      }
     }

    // Medium devices (tablets, 768px and up)
    @media (min-width: 768px) and (max-width: 991.98px) {
      .wrapper {
        width: 1200px;
        height: auto;
      }
    }

    // Large devices (desktops, 992px and up)
    @media (min-width: 992px) and (max-width: 1199.98px) {
      .wrapper {
        width: 1200px;
        height: auto;
      }
    }

    // Extra large devices (large desktops, 1200px and up)



</style>