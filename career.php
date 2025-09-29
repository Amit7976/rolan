<?php /* Template Name: career */
get_header("new"); ?>


<section class="bg-[url('https://manageplus.io/wp-content/themes/atoliz/images/heroHome.png')] bg-repeat">
    <div class="max-w-[1440px] mx-auto px-9 py-7 flex flex-col sm:flex-row justify-between">
        <!-- Left Text Column -->
        <div class="flex flex-col justify-center py-10 text-center sm:text-left">
            <!-- Small Icon + Label -->
            <div class="flex items-center gap-3 justify-center">
                <div class="flex justify-center items-center w-[50px] h-[50px] bg-black rounded-[13px]">
                    <img src="https://manageplus.io/wp-content/themes/atoliz/images/job-icon.png" alt="Job Icon"
                        class="w-[65%]" />
                </div>
                <p class="text-xl sm:text-2xl lg:text-[29px] lg:leading-[37.7px] font-normal text-black tracking-[0.46px] sm:w-[87%]">
                    Careers with us
                </p>
            </div>

            <!-- Main Heading -->
            <h1 class="relative mt-6 pt-2 pb-5 text-xl sm:text-xl lg:text-[50px] lg:leading-[61px] font-bold text-black capitalize z-0">
                The
                <span class="relative pl-2">
                    future of ManagePlus
                    <img src="https://manageplus.io/wp-content/themes/atoliz/images/headingBack.png" alt=""
                        class="absolute bottom-[5px] left-0 w-full -z-10" />
                </span>
                <br />
                starts with you
            </h1>

            <!-- Description -->
            <p class="mt-6 text-base text-lg lg:text-[23px] lg:leading-[29.9px] font-normal text-black tracking-[0.46px] sm:w-[87%]">
                We believe in hiring driven people who want to make an impact. So bring
                your best, and let’s build the future of ManagePlus together.
            </p>
        </div>

        <!-- Right Image -->
        <div>
            <img src="https://manageplus.io/wp-content/themes/atoliz/images/hero-career.png" alt="Careers Hero"
                class="w-1/2 sm:w-full sm:max-w-full mx-auto" />
        </div>
    </div>
</section>



<section class="max-w-[1440px] mx-auto my-28 px-4">
    <h2 class="text-center text-3xl font-bold text-gray-800">
        ManagePlus Current Job Openings
    </h2>

    <!-- Search + Filters -->
    <div class="flex flex-col md:flex-row justify-between items-center mt-8 gap-6">
        <!-- Search -->
        <form id="searchForm" class="flex w-full md:w-1/4 h-18 pl-10 pr-2 py-2 border border-gray-300 rounded-md">
            <input id="searchInput" type="text" placeholder="Search job title..."
                class="flex-1 rounded-l-md focus:outline-none focus:ring-1 focus:ring-indigo-500" />
            <button class="bg-indigo-600 text-white px-4 rounded-md aspect-square hover:bg-indigo-700"
                type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-5 h-5 fill-white">
                    <path
                        d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z" />
                </svg>
            </button>
        </form>


        <div class="flex gap-4 w-full md:w-auto items-center flex-col sm:flex-row">
            <p class="font-bold">Filter By:</p>
            <div class="flex gap-4 w-full md:w-auto items-center justify-center">
                <select id="locationFilter"
                    class="py-3.5 text-black text-[100%] rounded border cursor-pointer appearance-none m-0 px-[28px] pt-[13px] pb-[15px] border-solid border-[#9099a9] w-fit">
                    <option value="">All Locations</option>
                    <option value="Remote">Remote</option>
                    <option value="Jaipur">Jaipur</option>
                </select>

                <select id="teamFilter"
                    class="py-3.5 text-black text-[100%] rounded border cursor-pointer appearance-none m-0 px-[28px] pt-[13px] pb-[15px] border-solid border-[#9099a9] w-fit">
                    <option value="">All Teams</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Content">Content</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Job List -->
    <div id="jobsContainer" class="mt-10 space-y-6"></div>
</section>

<script>
    // ----- Sample Job Data -----
    const jobs = [{
            title: "Product Marketing Specialist",
            team: "Marketing",
            location: "Remote",
            type: "Full-Time",
            openings: 3,
            description: "Drive product adoption with creative campaigns and cross-team collaboration.",
        },
        {
            title: "Frontend Engineer",
            team: "Engineering",
            location: "Jaipur",
            type: "Full-Time",
            openings: 2,
            description: "Build blazing fast UIs with React and Tailwind for millions of users.",
        },
        {
            title: "Content Writer",
            team: "Content",
            location: "Remote",
            type: "Part-Time",
            openings: 1,
            description: "Craft compelling blog posts, guides, and copy for diverse audiences.",
        },
    ];

    const jobsContainer = document.getElementById("jobsContainer");
    const searchInput = document.getElementById("searchInput");
    const locationFilter = document.getElementById("locationFilter");
    const teamFilter = document.getElementById("teamFilter");
    const searchForm = document.getElementById("searchForm");

    // ----- Render Jobs -----
    function renderJobs(list) {
        jobsContainer.innerHTML = "";
        if (list.length === 0) {
            jobsContainer.innerHTML =
                '<p class="text-center text-gray-600">No jobs found.</p>';
            return;
        }

        list.forEach((job) => {
            const card = document.createElement("div");
            card.className =
                "bg-white shadow-md rounded-lg p-6 flex flex-col md:flex-row justify-between";
            card.innerHTML = `
                <div class="md:w-2/3">
                  <h3 class="text-pink-600 text-lg font-semibold">${job.team}</h3>
                  <h4 class="text-xl font-bold mt-1">${job.title}</h4>
                  <p class="text-gray-700 mt-2">${job.description}</p>
                </div>
                <div class="md:w-1/3 mt-4 md:mt-0 text-left md:text-right">
                  <span class="block font-medium">${job.openings} opening${job.openings > 1 ? "s" : ""
                    }</span>
                  <p class="text-sm text-gray-600">${job.location} / ${job.type
                    }</p>
                  <a
                    href="#"
                    class="inline-block mt-3 bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700"
                  >Apply Here →</a>
                </div>
              `;
            jobsContainer.appendChild(card);
        });
    }

    // ----- Filter Logic -----
    function applyFilters(e) {
        if (e) e.preventDefault();
        const searchTerm = searchInput.value.toLowerCase();
        const loc = locationFilter.value;
        const team = teamFilter.value;

        const filtered = jobs.filter((job) => {
            const matchesSearch = job.title
                .toLowerCase()
                .includes(searchTerm);
            const matchesLoc = loc ? job.location === loc : true;
            const matchesTeam = team ? job.team === team : true;
            return matchesSearch && matchesLoc && matchesTeam;
        });

        renderJobs(filtered);
    }

    // ----- Event Listeners -----
    searchForm.addEventListener("submit", applyFilters);
    locationFilter.addEventListener("change", applyFilters);
    teamFilter.addEventListener("change", applyFilters);

    // Initial Render
    renderJobs(jobs);
</script>



<section class="max-w-[1440px] mx-auto px-0 font-roboto">
    <div class="m-9 rounded-2xl bg-[#fffCF6] p-10">
        <!-- Heading -->
        <h2 class="flex items-center gap-4 text-left text-[26px] leading-[30px] font-bold">
            <img src="https://manageplus.io/wp-content/themes/atoliz/images/bulk-yellow.png" alt="Pro Tips Icon"
                class="w-10" />
            <span class="pl-2 text-[32px] font-medium text-black">Pro Tips</span>
        </h2>

        <!-- Referral -->
        <div class="mt-7">
            <h4 class="text-[20px] leading-[22px] font-semibold text-black">
                Referral
            </h4>
            <p class="mt-3.5 text-[16px] leading-[22px] text-black">
                We encourage references from our existing team members. If you know
                someone, request them to refer you, it would increase your chances of
                getting shortlisted for the interview (if the profile matches our
                present vacancies).
            </p>
        </div>

        <!-- Two-column section -->
        <div class="mt-10 flex flex-col gap-10 md:flex-row">
            <!-- Left column -->
            <div class="md:w-2/5">
                <h4 class="text-[20px] leading-[22px] font-semibold text-black">
                    Provide All the Details Upfront
                </h4>
                <ul class="mt-6 flex flex-col gap-4">
                    <li class="flex gap-4 items-start text-[15px] leading-[22px]">
                        <img src="https://manageplus.io/wp-content/themes/atoliz/images/dot-yellow.svg" alt=""
                            class="w-5 min-w-[20px]" />
                        <span>Updated CV</span>
                    </li>
                    <li class="flex gap-4 items-start text-[15px] leading-[22px]">
                        <img src="https://manageplus.io/wp-content/themes/atoliz/images/dot-yellow.svg" alt=""
                            class="w-5 min-w-[20px]" />
                        <span>Current Salary / Package (where applicable)</span>
                    </li>
                    <li class="flex gap-4 items-start text-[15px] leading-[22px]">
                        <img src="https://manageplus.io/wp-content/themes/atoliz/images/dot-yellow.svg" alt=""
                            class="w-5 min-w-[20px]" />
                        <span>Expected Salary / Package</span>
                    </li>
                    <li class="flex gap-4 items-start text-[15px] leading-[22px]">
                        <img src="https://manageplus.io/wp-content/themes/atoliz/images/dot-yellow.svg" alt=""
                            class="w-5 min-w-[20px]" />
                        <span>Years of Experience</span>
                    </li>
                    <li class="flex gap-4 items-start text-[15px] leading-[22px]">
                        <img src="https://manageplus.io/wp-content/themes/atoliz/images/dot-yellow.svg" alt=""
                            class="w-5 min-w-[20px]" />
                        <span>Notice Period</span>
                    </li>
                </ul>
            </div>

            <!-- Right column -->
            <div class="md:w-3/5">
                <h4 class="text-[20px] leading-[22px] font-semibold text-black">
                    Re-Apply
                </h4>
                <ul class="mt-6 flex flex-col gap-4">
                    <li class="flex gap-4 items-start text-[15px] leading-[22px]">
                        <img src="https://manageplus.io/wp-content/themes/atoliz/images/dot-yellow.svg" alt=""
                            class="w-5 min-w-[20px]" />
                        <span>Updated CV</span>
                    </li>
                    <li class="flex gap-4 items-start text-[15px] leading-[22px]">
                        <img src="https://manageplus.io/wp-content/themes/atoliz/images/dot-yellow.svg" alt=""
                            class="w-5 min-w-[20px]" />
                        <span>
                            This will add the recently acquired skills and experience,
                            which may match up with any present vacancies. Vacancies keep
                            opening and this ensures your CV stays at the top.
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>


<!-- ///////////////////////// -->

<section id="featuresCards" class="bg-[#f7f4fe]">
    <div class="max-w-[1440px] m-auto p-9">
        <h2 class="text-[#000] text-center text-[2rem] not-italic font-medium leading-normal">Explore the
            products of ManagePlus</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 pb-[15px] max-w-[1440px] m-auto mt-10">
            <div id="heroCard1"
                class="pt-[1.125rem] rounded-[9px] group overflow-hidden flex flex-col justify-between h-full w-full bg-[url('https://manageplus.io/wp-content/themes/atoliz/images/heroHomeCard1.png')] bg-no-repeat bg-center bg-cover">
                <div class="pl-[1.125rem] flex justify-between pr-[1.125rem]">
                    <p class="text-[#000] text-[1.1875rem] not-italic font-medium leading-[30px]">Social Media
                        <br>Studio
                    </p>
                    <div
                        class="bg-[#f84c6f] w-[3.75rem] h-[3.75rem] min-w-[3.75rem] min-h-[3.75rem] flex justify-center items-center rounded-[9px]">
                        <img src="https://manageplus.io/wp-content/themes/atoliz/images/socialIcon.svg" alt=""
                            class="max-w-full align-middle border-none">
                    </div>
                </div>
                <div class="mt-[30px] relative">
                    <ul
                        class="list-none flex flex-col gap-[10px] rounded-tl-[11px] rounded-br-[8px] rounded-tr-[0] rounded-bl-[0] p-[10px] bg-[white] ml-[1.125rem]">
                        <li class="flex gap-[8px] text-[#000] text-[12px] font-normal leading-[30px]">
                            <img src="https://manageplus.io/wp-content/themes/atoliz/images/liIcon1.svg" alt=""
                                class="max-w-full align-middle border-none">
                            <span>Scheduling &amp; Publishing</span>
                        </li>
                        <li class="flex gap-[8px] text-[#000] text-[12px] font-normal leading-[30px]">
                            <img src="https://manageplus.io/wp-content/themes/atoliz/images/liIcon1.svg" alt=""
                                class="max-w-full align-middle border-none">
                            <span>Cross Channel Posting</span>
                        </li>
                        <li class="flex gap-[8px] text-[#000] text-[12px] font-normal leading-[30px]">
                            <img src="https://manageplus.io/wp-content/themes/atoliz/images/liIcon1.svg" alt=""
                                class="max-w-full align-middle border-none">
                            <span>Content Calendar Management</span>
                        </li>
                        <li class="flex gap-[8px] text-[#000] text-[12px] font-normal leading-[30px]">
                            <img src="https://manageplus.io/wp-content/themes/atoliz/images/liIcon1.svg" alt=""
                                class="max-w-full align-middle border-none">
                            <span>Task Management</span>
                        </li>
                        <li class="flex gap-[8px] text-[#000] text-[12px] font-normal leading-[30px]">
                            <img src="https://manageplus.io/wp-content/themes/atoliz/images/liIcon1.svg" alt=""
                                class="max-w-full align-middle border-none">
                            <span>Page &amp; Post Analytics</span>
                        </li>
                        <li class="flex gap-[8px] text-[#000] text-[12px] font-normal leading-[30px]">
                            <img src="https://manageplus.io/wp-content/themes/atoliz/images/liIcon1.svg" alt=""
                                class="max-w-full align-middle border-none">
                            <span>Post Click Tracking</span>
                        </li>
                    </ul>
                    <div
                        class=" absolute bottom-[0] w-full bg-[#6457f9] p-5 rounded-[8px]  translate-y-full group-hover:translate-y-0
                                                                                                                                                    transition-transform duration-300 ease-out">
                        <a href="/social-media-studio/" target="_self"
                            class="px-[20px] py-[13px] bg-[white] rounded-lg font-semibold text-[#6457f9] border-[1px] border-[solid] border-[white] text-[14px]">
                            Learn More </a>

                    </div>
                </div>
            </div>
            <div id="heroCard2"
                class="pt-[1.125rem] rounded-[9px] group overflow-hidden flex flex-col justify-between h-full w-full bg-[url('https://manageplus.io/wp-content/themes/atoliz/images/heroHomeCard2.png')] bg-no-repeat bg-center bg-cover">
                <div class="pl-[1.125rem] flex justify-between pr-[1.125rem]">
                    <p class="text-[#000] text-[1.1875rem] not-italic font-medium leading-[30px]">Email
                        <br>Studio
                    </p>
                    <div
                        class="bg-[#fdb42a] w-[3.75rem] h-[3.75rem] min-w-[3.75rem] min-h-[3.75rem] flex justify-center items-center rounded-[9px]">
                        <img src="https://manageplus.io/wp-content/themes/atoliz/images/emailIcon.svg" alt=""
                            class="max-w-full align-middle border-none">
                    </div>
                </div>
                <div class="mt-[30px] relative">
                    <ul
                        class="list-none flex flex-col gap-[10px] rounded-tl-[11px] rounded-br-[8px] rounded-tr-[0] rounded-bl-[0] p-[10px] bg-[white] ml-[1.125rem]">
                        <li class="flex gap-[8px] text-[#000] text-[12px] font-normal leading-[30px]">
                            <img src="https://manageplus.io/wp-content/themes/atoliz/images/liIcon2.svg" alt="">
                            <span>Cold Email Campaigns</span>
                        </li>
                        <li class="flex gap-[8px] text-[#000] text-[12px] font-normal leading-[30px]">
                            <img src="https://manageplus.io/wp-content/themes/atoliz/images/liIcon2.svg" alt="">
                            <span>10000 prospects in Standard Plan</span>
                        </li>
                        <li class="flex gap-[8px] text-[#000] text-[12px] font-normal leading-[30px]">
                            <img src="https://manageplus.io/wp-content/themes/atoliz/images/liIcon2.svg" alt="">
                            <span>Unlimited Sender Accounts</span>
                        </li>
                        <li class="flex gap-[8px] text-[#000] text-[12px] font-normal leading-[30px]">
                            <img src="https://manageplus.io/wp-content/themes/atoliz/images/liIcon2.svg" alt="">
                            <span>Advanced Workflows Automation</span>
                        </li>
                        <li class="flex gap-[8px] text-[#000] text-[12px] font-normal leading-[30px]">
                            <img src="https://manageplus.io/wp-content/themes/atoliz/images/liIcon2.svg" alt="">
                            <span>Email Open/Click/bounce Tracking</span>
                        </li>
                        <li class="flex gap-[8px] text-[#000] text-[12px] font-normal leading-[30px]">
                            <img src="https://manageplus.io/wp-content/themes/atoliz/images/liIcon2.svg" alt="">
                            <span>Visual Email Template Editor</span>
                        </li>
                    </ul>
                    <div class=" absolute bottom-[0] w-full bg-[#6457f9] p-5 rounded-[8px]  translate-y-full group-hover:translate-y-0
                                                                transition-transform duration-300 ease-out">
                        <a href="/email-studio/" target="_self"
                            class="px-[20px] py-[13px] bg-[white] rounded-lg font-semibold text-[#6457f9] border-[1px] border-[solid] border-[white] text-[14px]">
                            Learn More </a>

                    </div>
                </div>
            </div>
            <div id="heroCard3"
                class="pt-[1.125rem] rounded-[9px] group overflow-hidden flex flex-col justify-between h-full w-full bg-[url('https://manageplus.io/wp-content/themes/atoliz/images/heroHomeCard3.png')] bg-no-repeat bg-center bg-cover">
                <div class="pl-[1.125rem] flex justify-between pr-[1.125rem]">
                    <p class="text-[#000] text-[1.1875rem] not-italic font-medium leading-[30px]">Sales <br>CRM
                    </p>
                    <div
                        class="bg-[#00c1f3] w-[3.75rem] h-[3.75rem] min-w-[3.75rem] min-h-[3.75rem] flex justify-center items-center rounded-[9px]">
                        <img src="https://manageplus.io/wp-content/themes/atoliz/images/crmIcon.svg" alt=""
                            class="max-w-full align-middle border-none">
                    </div>
                </div>
                <div class="mt-[30px] relative">
                    <ul
                        class="list-none flex flex-col gap-[10px] rounded-tl-[11px] rounded-br-[8px] rounded-tr-[0] rounded-bl-[0] p-[10px] bg-[white] ml-[1.125rem]">
                        <li class="flex gap-[8px] text-[#000] text-[12px] font-normal leading-[30px]">
                            <img src="https://manageplus.io/wp-content/themes/atoliz/images/liIcon3.svg" alt="">
                            <span>Contact Management</span>
                        </li>
                        <li class="flex gap-[8px] text-[#000] text-[12px] font-normal leading-[30px]">
                            <img src="https://manageplus.io/wp-content/themes/atoliz/images/liIcon3.svg" alt="">
                            <span>Account Management</span>
                        </li>
                        <li class="flex gap-[8px] text-[#000] text-[12px] font-normal leading-[30px]">
                            <img src="https://manageplus.io/wp-content/themes/atoliz/images/liIcon3.svg" alt="">
                            <span>Unified Email Inbox</span>
                        </li>
                        <li class="flex gap-[8px] text-[#000] text-[12px] font-normal leading-[30px]">
                            <img src="https://manageplus.io/wp-content/themes/atoliz/images/liIcon3.svg" alt="">
                            <span>360 Customer View</span>
                        </li>
                        <li class="flex gap-[8px] text-[#000] text-[12px] font-normal leading-[30px]">
                            <img src="https://manageplus.io/wp-content/themes/atoliz/images/liIcon3.svg" alt="">
                            <span>Email &amp; Activity logs</span>
                        </li>
                        <li class="flex gap-[8px] text-[#000] text-[12px] font-normal leading-[30px]">
                            <img src="https://manageplus.io/wp-content/themes/atoliz/images/liIcon3.svg" alt="">
                            <span>Deal Management</span>
                        </li>
                    </ul>
                    <div
                        class=" absolute bottom-[0] w-full bg-[#6457f9] p-5 rounded-[8px]  translate-y-full group-hover:translate-y-0
                                                                                            transition-transform duration-300 ease-out">
                        <a href="/sales-crm/" target="_self"
                            class="px-[20px] py-[13px] bg-[white] rounded-lg font-semibold text-[#6457f9] border-[1px] border-[solid] border-[white] text-[14px]">
                            Learn More </a>

                    </div>
                </div>
            </div>
            <div id="heroCard4"
                class="pt-[1.125rem] rounded-[9px] group overflow-hidden flex flex-col justify-between h-full w-full bg-[url('https://manageplus.io/wp-content/themes/atoliz/images/heroHomeCard4.png')] bg-no-repeat bg-center bg-cover">
                <div class="pl-[1.125rem] flex justify-between pr-[1.125rem]">
                    <p class="text-[#000] text-[1.1875rem] not-italic font-medium leading-[30px]">Website
                        Visitor <br>Tracking</p>
                    <div
                        class="bg-[#6457f9] w-[3.75rem] h-[3.75rem] min-w-[3.75rem] min-h-[3.75rem] flex justify-center items-center rounded-[9px]">
                        <img src="https://manageplus.io/wp-content/themes/atoliz/images/visitTrackIcon.svg" alt=""
                            class="max-w-full align-middle border-none">
                    </div>
                </div>
                <div class="mt-[30px] relative">
                    <ul
                        class="list-none flex flex-col gap-[10px] rounded-tl-[11px] rounded-br-[8px] rounded-tr-[0] rounded-bl-[0] p-[10px] bg-[white] ml-[1.125rem]">
                        <li class="flex gap-[8px] text-[#000] text-[12px] font-normal leading-[30px]">
                            <img src="https://manageplus.io/wp-content/themes/atoliz/images/liIcon4.svg" alt="">
                            <span>Website visitor tracking</span>
                        </li>
                        <li class="flex gap-[8px] text-[#000] text-[12px] font-normal leading-[30px]">
                            <img src="https://manageplus.io/wp-content/themes/atoliz/images/liIcon4.svg" alt="">
                            <span>Page views tracking</span>
                        </li>
                        <li class="flex gap-[8px] text-[#000] text-[12px] font-normal leading-[30px]">
                            <img src="https://manageplus.io/wp-content/themes/atoliz/images/liIcon4.svg" alt="">
                            <span>Page Stay time tracking</span>
                        </li>
                        <li class="flex gap-[8px] text-[#000] text-[12px] font-normal leading-[30px]">
                            <img src="https://manageplus.io/wp-content/themes/atoliz/images/liIcon4.svg" alt="">
                            <span>Lead Engagement Tracking</span>
                        </li>
                        <li class="flex gap-[8px] text-[#000] text-[12px] font-normal leading-[30px]">
                            <img src="https://manageplus.io/wp-content/themes/atoliz/images/liIcon4.svg" alt="">
                            <span>Campaign mapping</span>
                        </li>
                        <li class="flex gap-[8px] text-[#000] text-[12px] font-normal leading-[30px]">
                            <img src="https://manageplus.io/wp-content/themes/atoliz/images/liIcon4.svg" alt="">
                            <span>User Source mapping</span>
                        </li>
                    </ul>
                    <div
                        class=" absolute bottom-[0] w-full bg-[#6457f9] p-5 rounded-[8px]  translate-y-full group-hover:translate-y-0
                                                                                                                        transition-transform duration-300 ease-out">
                        <a href="/website-activity-tracking/" target="_self"
                            class="px-[20px] py-[13px] bg-[white] rounded-lg font-semibold text-[#6457f9] border-[1px] border-[solid] border-[white] text-[14px]">
                            Learn More </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="bg-white">
    <div class="max-w-[1440px] m-auto px-9 py-[3.75rem]">
        <h2 class="text-center text-2xl font-semibold">
            People Also Ask: Questions About Customer Success
        </h2>
        <p class="text-center mt-2.5 text-gray-600">
            Explore these insightful responses to frequently asked questions about
            customer success and the software utilized by ManagePlus teams.
        </p>

        <div id="accordion" class="mt-10">
            <!-- Q1 -->
            <div class="py-8">
                <button class="flex w-full items-center justify-between text-left" data-accordion-btn>
                    <span class="text-black text-base font-medium">
                        1. What is Social Media Marketing (SMM)?
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="text-[#6457f9] transition-transform duration-300 w-5 h-5" viewBox="0 0 640 640">
                        <path
                            d="M297.4 438.6C309.9 451.1 330.2 451.1 342.7 438.6L502.7 278.6C515.2 266.1 515.2 245.8 502.7 233.3C490.2 220.8 469.9 220.8 457.4 233.3L320 370.7L182.6 233.4C170.1 220.9 149.8 220.9 137.3 233.4C124.8 245.9 124.8 266.2 137.3 278.7L297.3 438.7z" />
                    </svg>
                </button>
                <p class="hidden mt-3 pl-4 text-[15px] text-gray-700">
                    Social Media Marketing is the use of social media platforms to connect
                    with your audience, build your brand, and drive website traffic or
                    sales.
                </p>
            </div>

            <!-- Q2 -->
            <div class="py-8">
                <button class="flex w-full items-center justify-between text-left" data-accordion-btn>
                    <span class="text-black text-base font-medium">
                        2. Which Social Media Platforms Should I Use for Marketing?
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="text-[#6457f9] transition-transform duration-300 w-5 h-5" viewBox="0 0 640 640">
                        <path
                            d="M297.4 438.6C309.9 451.1 330.2 451.1 342.7 438.6L502.7 278.6C515.2 266.1 515.2 245.8 502.7 233.3C490.2 220.8 469.9 220.8 457.4 233.3L320 370.7L182.6 233.4C170.1 220.9 149.8 220.9 137.3 233.4C124.8 245.9 124.8 266.2 137.3 278.7L297.3 438.7z" />
                    </svg>
                </button>
                <p class="hidden mt-3 pl-4 text-[15px] text-gray-700">
                    Focus on platforms where your audience is most active such as
                    Facebook, Instagram, LinkedIn, or X/Twitter.
                </p>
            </div>

            <!-- Q3 -->
            <div class="py-8">
                <button class="flex w-full items-center justify-between text-left" data-accordion-btn>
                    <span class="text-black text-base font-medium">
                        3. How Often Should I Post on Social Media?
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="text-[#6457f9] transition-transform duration-300 w-5 h-5" viewBox="0 0 640 640">
                        <path
                            d="M297.4 438.6C309.9 451.1 330.2 451.1 342.7 438.6L502.7 278.6C515.2 266.1 515.2 245.8 502.7 233.3C490.2 220.8 469.9 220.8 457.4 233.3L320 370.7L182.6 233.4C170.1 220.9 149.8 220.9 137.3 233.4C124.8 245.9 124.8 266.2 137.3 278.7L297.3 438.7z" />
                    </svg>
                </button>
                <p class="hidden mt-3 pl-4 text-[15px] text-gray-700">
                    Consistency matters more than quantity—start with 3-4 posts a week and
                    adjust based on engagement.
                </p>
            </div>

            <!-- Q4 -->
            <div class="py-8">
                <button class="flex w-full items-center justify-between text-left" data-accordion-btn>
                    <span class="text-black text-base font-medium">
                        4. What Type of Content Should I Share?
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="text-[#6457f9] transition-transform duration-300 w-5 h-5" viewBox="0 0 640 640">
                        <path
                            d="M297.4 438.6C309.9 451.1 330.2 451.1 342.7 438.6L502.7 278.6C515.2 266.1 515.2 245.8 502.7 233.3C490.2 220.8 469.9 220.8 457.4 233.3L320 370.7L182.6 233.4C170.1 220.9 149.8 220.9 137.3 233.4C124.8 245.9 124.8 266.2 137.3 278.7L297.3 438.7z" />
                    </svg>
                </button>
                <p class="hidden mt-3 pl-4 text-[15px] text-gray-700">
                    Mix educational posts, behind-the-scenes stories, customer
                    testimonials, and interactive polls.
                </p>
            </div>

            <!-- Q5 -->
            <div class="py-8">
                <button class="flex w-full items-center justify-between text-left" data-accordion-btn>
                    <span class="text-black text-base font-medium">
                        5. How Can I Increase Engagement on Social Media?
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="text-[#6457f9] transition-transform duration-300 w-5 h-5" viewBox="0 0 640 640">
                        <path
                            d="M297.4 438.6C309.9 451.1 330.2 451.1 342.7 438.6L502.7 278.6C515.2 266.1 515.2 245.8 502.7 233.3C490.2 220.8 469.9 220.8 457.4 233.3L320 370.7L182.6 233.4C170.1 220.9 149.8 220.9 137.3 233.4C124.8 245.9 124.8 266.2 137.3 278.7L297.3 438.7z" />
                    </svg>
                </button>
                <p class="hidden mt-3 pl-4 text-[15px] text-gray-700">
                    Use eye-catching visuals, reply quickly to comments, and post when
                    your audience is most active.
                </p>
            </div>

            <!-- Q6 -->
            <div class="py-8">
                <button class="flex w-full items-center justify-between text-left" data-accordion-btn>
                    <span class="text-black text-base font-medium">
                        6. Should I Use Paid Advertising on Social Media?
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="text-[#6457f9] transition-transform duration-300 w-5 h-5" viewBox="0 0 640 640">
                        <path
                            d="M297.4 438.6C309.9 451.1 330.2 451.1 342.7 438.6L502.7 278.6C515.2 266.1 515.2 245.8 502.7 233.3C490.2 220.8 469.9 220.8 457.4 233.3L320 370.7L182.6 233.4C170.1 220.9 149.8 220.9 137.3 233.4C124.8 245.9 124.8 266.2 137.3 278.7L297.3 438.7z" />
                    </svg>
                </button>
                <p class="hidden mt-3 pl-4 text-[15px] text-gray-700">
                    Paid ads help reach targeted audiences faster and are great for
                    boosting key campaigns.
                </p>
            </div>

            <!-- Q7 -->
            <div class="py-8">
                <button class="flex w-full items-center justify-between text-left" data-accordion-btn>
                    <span class="text-black text-base font-medium">
                        7. How Can I Measure the Success of My Social Media Marketing?
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="text-[#6457f9] transition-transform duration-300 w-5 h-5" viewBox="0 0 640 640">
                        <path
                            d="M297.4 438.6C309.9 451.1 330.2 451.1 342.7 438.6L502.7 278.6C515.2 266.1 515.2 245.8 502.7 233.3C490.2 220.8 469.9 220.8 457.4 233.3L320 370.7L182.6 233.4C170.1 220.9 149.8 220.9 137.3 233.4C124.8 245.9 124.8 266.2 137.3 278.7L297.3 438.7z" />
                    </svg>
                </button>
                <p class="hidden mt-3 pl-4 text-[15px] text-gray-700">
                    Track metrics like reach, engagement rate, clicks, and conversions
                    using platform analytics.
                </p>
            </div>

            <!-- Q8 -->
            <div class="py-8">
                <button class="flex w-full items-center justify-between text-left" data-accordion-btn>
                    <span class="text-black text-base font-medium">
                        8. What Mistakes Should I Avoid in Social Media Marketing?
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="text-[#6457f9] transition-transform duration-300 w-5 h-5" viewBox="0 0 640 640">
                        <path
                            d="M297.4 438.6C309.9 451.1 330.2 451.1 342.7 438.6L502.7 278.6C515.2 266.1 515.2 245.8 502.7 233.3C490.2 220.8 469.9 220.8 457.4 233.3L320 370.7L182.6 233.4C170.1 220.9 149.8 220.9 137.3 233.4C124.8 245.9 124.8 266.2 137.3 278.7L297.3 438.7z" />
                    </svg>
                </button>
                <p class="hidden mt-3 pl-4 text-[15px] text-gray-700">
                    Avoid inconsistent posting, ignoring comments, and using irrelevant
                    hashtags.
                </p>
            </div>

            <!-- Q9 -->
            <div class="py-8">
                <button class="flex w-full items-center justify-between text-left" data-accordion-btn>
                    <span class="text-black text-base font-medium">
                        9. How Can I Build a Social Media Community?
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="text-[#6457f9] transition-transform duration-300 w-5 h-5" viewBox="0 0 640 640">
                        <path
                            d="M297.4 438.6C309.9 451.1 330.2 451.1 342.7 438.6L502.7 278.6C515.2 266.1 515.2 245.8 502.7 233.3C490.2 220.8 469.9 220.8 457.4 233.3L320 370.7L182.6 233.4C170.1 220.9 149.8 220.9 137.3 233.4C124.8 245.9 124.8 266.2 137.3 278.7L297.3 438.7z" />
                    </svg>
                </button>
                <p class="hidden mt-3 pl-4 text-[15px] text-gray-700">
                    Encourage discussions, host live sessions, and spotlight your
                    followers’ content.
                </p>
            </div>

            <!-- Q10 -->
            <div class="py-8">
                <button class="flex w-full items-center justify-between text-left" data-accordion-btn>
                    <span class="text-black text-base font-medium">
                        10. Should I Automate My Social Media Posts?
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="text-[#6457f9] transition-transform duration-300 w-5 h-5" viewBox="0 0 640 640">
                        <path
                            d="M297.4 438.6C309.9 451.1 330.2 451.1 342.7 438.6L502.7 278.6C515.2 266.1 515.2 245.8 502.7 233.3C490.2 220.8 469.9 220.8 457.4 233.3L320 370.7L182.6 233.4C170.1 220.9 149.8 220.9 137.3 233.4C124.8 245.9 124.8 266.2 137.3 278.7L297.3 438.7z" />
                    </svg>
                </button>
                <p class="hidden mt-3 pl-4 text-[15px] text-gray-700">
                    Yes—scheduling tools save time and keep posting consistent, but still
                    monitor for real-time engagement.
                </p>
            </div>
        </div>
    </div>
</section>

<script>
    document.querySelectorAll('[data-accordion-btn]').forEach((btn) => {
        btn.addEventListener('click', () => {
            const answer = btn.nextElementSibling;
            const icon = btn.querySelector('svg');

            // close others for true accordion effect
            document.querySelectorAll('#accordion p').forEach((p) => {
                if (p !== answer) p.classList.add('hidden');
            });
            document.querySelectorAll('#accordion svg').forEach((i) => {
                if (i !== icon) i.classList.remove('rotate-180'); // <- fix here
            });

            // toggle current
            answer.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        });
    });
</script>

<?php get_footer("new") ?>