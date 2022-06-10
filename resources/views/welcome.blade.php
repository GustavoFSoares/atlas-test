@extends('layouts.app')

@section('class', 'welcome-page')

@section('content')
<div class="welcome-page" onload="welcomeOnLoad()">
  <div class="fm-carousel">
    <div class="fm-carousel__images">
      <img id="fm-carousel-image-1" class="fm-carousel__images--item fm-carousel__images--item-1" src="{{URL::asset('/img/carousel/1.png')}}" alt="fm-carousel-1">
      <img id="fm-carousel-image-2" class="fm-carousel__images--item fm-carousel__images--item-2" src="{{URL::asset('/img/carousel/2.png')}}" alt="fm-carousel-2">
      <img id="fm-carousel-image-3" class="fm-carousel__images--item fm-carousel__images--item-3" src="{{URL::asset('/img/carousel/3.png')}}" alt="fm-carousel-3">
    </div>

    <div class="fm-carousel__control">
      <span id="fm-carousel-control-1" class="fm-carousel__control--item fm-carousel__control--item-1"></span>
      <span id="fm-carousel-control-2" class="fm-carousel__control--item fm-carousel__control--item-2"></span>
      <span id="fm-carousel-control-3" class="fm-carousel__control--item fm-carousel__control--item-3"></span>
    </div>
  </div>
</div>
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
    carousel.currentImage = imageId

    const image = document.getElementById(`fm-carousel-image-${imageId}`)
    image.scrollIntoView({
      behavior: "smooth",
      block: "start",
      inline: "nearest"
    });
  },
  startListners: () => {
    const controlList = document.querySelector('.fm-carousel .fm-carousel__control')
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
  carousel.startListners()
  carousel.startNewInterval()
}
</script>
