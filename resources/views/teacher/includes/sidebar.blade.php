<div class="col-lg-4 ps-2">
    <aside class="profile-sidebar pt-5">
        <div class="user-info">
            <div class="user-info-top">
                <div class="user-thumb">
                    
                    @if(!get_current_teacher()->dp) 
                        <img src="{{asset_url('website/assets/images/empty.jpg')}}" alt="user" style="height: 73px;">
                    @else
                        <img src="{{asset_url('storage/images/teachers')}}/{{get_current_teacher()->dp}}" alt="user" style="height: 73px;">
                    @endif
                </div>
                <div class="user-content">
                    <h3 class="user-name mb-0">{{get_current_teacher()->fullname()}}</h3>
                    @if(get_current_teacher()->sub_id == 0)
                    <span class="account-type">Pay as you go</span>
                    @else
                    <span class="account-type">ফ্রী অ্যাকাউন্ট</span>
                    @endif
                </div>
                <a href="{{route('teacher.profile.edit')}}" class="account-edit">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                        <mask id="mask0_1104_27216" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0"
                                y="0" width="24" height="24">
                            <rect width="24" height="24" fill="#D9D9D9"/>
                        </mask>
                        <g mask="url(#mask0_1104_27216)">
                            <path d="M5 19H6.4L15.025 10.375L13.625 8.975L5 17.6V19ZM19.3 8.925L15.05 4.725L16.45 3.325C16.8333 2.94167 17.3043 2.75 17.863 2.75C18.421 2.75 18.8917 2.94167 19.275 3.325L20.675 4.725C21.0583 5.10833 21.2583 5.571 21.275 6.113C21.2917 6.65433 21.1083 7.11667 20.725 7.5L19.3 8.925ZM17.85 10.4L7.25 21H3V16.75L13.6 6.15L17.85 10.4Z"
                                    fill="#F29C1F"/>
                        </g>
                    </svg>
                </a>
            </div>
            <ul>
                <li><span>Teaches at</span> {{get_current_teacher()->school}}</li>
                <li><span>Phone</span> {{get_current_teacher()->phone}}</li>
                <li><span>E-Mail</span>{{get_current_teacher()->email}}</li>
            </ul>
        </div>
        <!-- <div class="upcoming-workshop pt-0">
            <h6 class="widget-title fw-400 helper-text-ash">আপকামিং ওয়ার্কশপ</h6>
            <div class="upcoming-workshop-item">
                <div class="upcoming-workshop-thumb">
                    <a href="">
                        <img src="{{asset_url('website/assets/images/upcoming-workshop-2.png')}}" alt="workshop">
                    </a>
                </div>
                <div class="upcoming-workshop-content">
                    <div class="upcoming-workshop-meta d-flex align-items-center justify-content-between">
                        <span class="date">22 Jul, 2022</span>
                        <a class="read-more" href="">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_1104_7561)">
                                    <path d="M8.58984 16.59L13.1698 12L8.58984 7.41L9.99984 6L15.9998 12L9.99984 18L8.58984 16.59Z"
                                            fill="#F29C1F"/>
                                </g>
                                <rect x="1" y="1" width="22" height="22" rx="11" stroke="#F29C1F"
                                        stroke-width="2"/>
                                <defs>
                                    <clipPath id="clip0_1104_7561">
                                        <rect width="24" height="24" rx="12" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </div>
                    <p class="mb-0">
                        <a href="">Fun Ways to Teach: Subject Based Games to Make Learning Engaging and Joyful</a>
                    </p>
                </div>
            </div>
        </div> -->
        <!-- <div class="achievement-widget">
            <h6 class="widget-title fw-400 helper-text-ash">আপনার আচিভমেন্ট</h6>
            <div class="achievement-item d-flex">
                <div class="achievement-thumb">
                    <img src="{{asset_url('website/assets/images/trophy.png')}}" alt="achievement">
                </div>
                <div class="achievement-content">
                    <p class="fw-600">Life Skills Development</p>
                    <span class="date">Issued 24 Mar, 2022</span>
                </div>
            </div>
            <div class="achievement-item d-flex">
                <div class="achievement-thumb">
                    <img src="{{asset_url('website/assets/images/trophy.png')}}" alt="achievement">
                </div>
                <div class="achievement-content">
                    <p class="fw-600">Critical Question Formulation and Effective Feedback</p>
                    <span class="date">Issued 24 Mar, 2022</span>
                </div>
            </div>
        </div> -->
    </aside>
</div>