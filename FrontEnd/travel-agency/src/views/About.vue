<script setup>
</script>

<template>
  <div class="about-container">
    <div class="about-image-container">
      <img src="@/assets/aboutIcon.png" alt="About Us" />
    </div>
    <div class="philosophy-container">
      <h3>Our Philosophy</h3>
      <p>The magic of travel, made of thousands of small moments of pleasure, is transmuted into the futuristic lines of
        the horizon, the rugged wildness of the mountain landscapes, the bustling bazaars, the dusty alleys and the
        imposing buildings. Unintelligible words, strange habits, bridge yesterday with today, here with everywhere.
        Travelling, the world seems like a coherent picture, a system where everything is mixed up to be reconstructed
        in an original unity. The catalyst for this wonderful chemistry is the warm smiles and shy looks, yet they
        become so familiar, and allude to the very essence of life.
      </p>
    </div>
    <div class="about-image-container">
      <img src="@/assets/aboutIcon.png" alt="About Us" />
    </div>
    <div class="site-navigation-container">
      <h3>Our Trips</h3>
      <p>Our trips are designed to offer you the best experience possible. We have a wide range of trips to choose from,
        so you can find the perfect one for you. Whether you're looking for a relaxing beach holiday, an adventurous
        trek through the mountains, or a cultural tour of a new city, we have something for everyone.</p>
      <p>Select the correct trip type for you. In the categories section you can choose whether you travel solo, in a
        group, for honeymoon or with family. Filtered trip options appear according to your selection. Additionally, you
        can navigate to destination options by first selecting a continent and then the trip you prefer.</p>
    </div>
  </div>
</template>

<style scoped>
.about-container {
  min-height: 100vh;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.about-image-container {
  width: 50%;
  display: flex;
  justify-content: center;
  margin: 2em 0;
}

.about-image-container img {
  width: 5%;
  height: auto;
}

.philosophy-container {
  width: 50%;
  margin: 0 2em;
}

.site-navigation-container {
  width: 50%;
  margin: 0 2em;
}

h3 {
  font-size: 1em;
  margin-bottom: 1em;
  text-align: center;
  color: rgb(198, 89, 21);
  font-style: oblique;
}

p {
  font-size: 1em;
  line-height: 1.5em;
  text-align: justify;
  color: #333;

}

</style>
