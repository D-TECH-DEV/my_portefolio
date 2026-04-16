<link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">

<!-- Flaticon -->
<link rel="stylesheet" href="{{ asset('assets/css/flaticon.min.css')}}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('assets/css/fontawesome-5.14.0.min.css')}}">
<!-- Bootstrap -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
<!-- Nice Select -->
<link rel="stylesheet" href="{{ asset('assets/css/nice-select.min.css')}}">
<!-- Animate -->
<link rel="stylesheet" href="{{ asset('assets/css/animate.min.css')}}">
<!-- Slick -->
<link rel="stylesheet" href="{{ asset('assets/css/slick.min.css')}}">
<!-- Main Style -->
<link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">

<style>
  .avatar-initial {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    background: linear-gradient(135deg, #14053f, #fdf90d);
    color: #14053f;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 22px;
  }

  .project-grid-image {
    width: 100%;
    height: 300px !important;
    object-fit: cover;
    border-radius: 15px;
    transition: transform 0.5s ease;
  }

  .project-item.style-three:hover .project-grid-image {
    transform: scale(1.1);
  }

  .project-card-link {
    display: block;
    text-decoration: none;
    cursor: pointer;
  }

  .project-item.style-three {
    overflow: hidden;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
    position: relative;
    /* Force gradient visibility */
    background: #0d1b3e; /* fallback */
    transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.4s ease;
    border: 1px solid rgba(255, 255, 255, 0.05);
  }

  .project-item.style-three:hover {
    transform: translateY(-10px);
    box-shadow: 0 25px 45px rgba(220, 167, 58, 0.15);
    border-color: rgba(220, 167, 58, 0.2);
  }
  
  .project-item.style-three::before {
    content: '';
    position: absolute;
    inset: 0;
    transition: opacity 0.5s ease;
    z-index: 1;
    background: linear-gradient(to top, rgba(10, 17, 40, 0.95) 0%, rgba(10, 17, 40, 0.6) 40%, transparent 100%);
    opacity: 0.8;
  }

  .project-item.style-three:hover::before {
    opacity: 1;
  }

  .project-item.style-three .project-content {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      padding: 35px 30px;
      z-index: 2;
      opacity: 0.9;
      transform: translateY(15px);
      transition: all 0.5s cubic-bezier(0.25, 1, 0.5, 1);
  }
  
  .project-item.style-three:hover .project-content {
      opacity: 1;
      transform: translateY(0);
  }

  .project-item.style-three .project-content h4 {
      font-size: 24px;
      margin-top: 15px;
      margin-bottom: 0;
      color: #ffffff;
      font-weight: 700;
      line-height: 1.3;
      text-shadow: 0 2px 4px rgba(0,0,0,0.5);
  }

  .project-item.style-three .project-content .category-badge {
      font-size: 13px;
      font-weight: 700;
      color: #dca73a;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      margin-bottom: 0px;
      background: rgba(220, 167, 58, 0.1);
      padding: 6px 14px;
      border-radius: 30px;
      text-transform: uppercase;
      letter-spacing: 1px;
      backdrop-filter: blur(5px);
      border: 1px solid rgba(220, 167, 58, 0.2);
  }
  
  .project-item.style-three .project-content .project-btn {
      color: #0d1b3e;
      background: #ffffff;
      width: 45px;
      height: 45px;
      border-radius: 50%;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
      position: absolute;
      right: 30px;
      bottom: 35px;
      transition: all 0.4s ease;
      opacity: 0;
      transform: translateX(-20px) rotate(-45deg);
  }
  
  .project-item.style-three:hover .project-content .project-btn {
      background: #dca73a;
      color: #ffffff;
      opacity: 1;
      transform: translateX(0) rotate(0deg);
      box-shadow: 0 0 15px rgba(220, 167, 58, 0.4);
  }
</style>