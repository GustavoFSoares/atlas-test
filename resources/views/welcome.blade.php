@extends('layouts.app')

@section('class', 'welcome-page-background')

@section('content')
<section class="welcome-page container">
  <div class="welcome-page__content">
    <h1 class="title">Pokedex</h1>

    <h3 class="description">
      Use the Advanced Search to explore Pokémon by type, weakness, Ability, and more! Search for a Pokémon by name or using its National Pokédex number.
    </h3>

    <div class="button-container">
      <a class="fm-button" href="list">Seach Pokemon</a>
    </div>
  </div>

  <div class="welcome-page__carousel fm-carousel">
    <div class="images">
      <img id="fm-carousel-image-1" class="images__item images__item--1" src="{{URL::asset('/img/carousel/1.png')}}" alt="fm-carousel-1">
      <img id="fm-carousel-image-2" class="images__item images__item--2" src="{{URL::asset('/img/carousel/2.png')}}" alt="fm-carousel-2">
      <img id="fm-carousel-image-3" class="images__item images__item--3" src="{{URL::asset('/img/carousel/3.png')}}" alt="fm-carousel-3">
    </div>

    <div class="control">
      <span id="fm-carousel-control-1" class="control__item control__item--1"></span>
      <span id="fm-carousel-control-2" class="control__item control__item--2"></span>
      <span id="fm-carousel-control-3" class="control__item control__item--3"></span>
    </div>
  </div>
</section>
@endsection

<script>
const carousel = {
  currentImage: 1,
  interval: null,
  handleClickControl: (imageId) => {
    carousel.startNewInterval()
    carousel.scrollCarousel(imageId)
  },
  scrollCarousel: (imageId) => {
    const lastControl = document.getElementById(`fm-carousel-control-${carousel.currentImage}`)
    if (lastControl) {
      lastControl.classList.remove('checked')
    }

    carousel.currentImage = imageId

    const image = document.getElementById(`fm-carousel-image-${imageId}`)
    image.scrollIntoView({
      behavior: "smooth",
      block: "start",
      inline: "nearest"
    });

    document.getElementById(`fm-carousel-control-${imageId}`).classList.add('checked')
  },
  startListeners: () => {
    const controlList = document.querySelector('.fm-carousel .control')
    for (const controlItem of controlList.children) {
      const itemId = controlItem.id.replace('fm-carousel-control-', '')

      controlItem.addEventListener('click', () => carousel.handleClickControl(itemId))
    }
  },
  startNewInterval: () => {
    if (carousel.interval) {
      clearInterval(carousel.interval)
    }

    carousel.interval = setInterval(() => {
      let nextImage = carousel.currentImage+1
      if (nextImage > 3) {
        nextImage = 1
      }

      carousel.scrollCarousel(nextImage)
    }, 5000);
  }
}

window.onload = () => {
  carousel.scrollCarousel(1)
  carousel.startListeners()
  carousel.startNewInterval()
}
</script>
