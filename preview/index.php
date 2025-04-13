<?php
$title = "Ulf Dellbrügge - Software Engineer";
include $_SERVER['DOCUMENT_ROOT'] . "/html/start.php";
?>
<a href="./">editor</a>
<div id="preview-content">
    <!-- This is where the content will be rendered -->
    <section id="title">
        <h1>
            <span>Ulf Dellbrügge</span>
            <span class="dash"></span>
            <span>Software Engineer</span>
        </h1>
    </section>

    <section id="contact">
        <span>
            <a href="https://www.linkedin.com/in/ulf-dellbr%C3%BCgge-95174918a/" target="_blank">
                LinkedIn
            </a>
        </span>
        <span class="dash"></span>
        <span>
            <a href="mailto:ulfdellbruegge@gmail.com">
                ulfdellbruegge@gmail.com
            </a>
        </span>
        <span class="dash"></span>
        <span>
            <a href="https://github.com/xintamosaik" target="_blank">
                github.com/xintamosaik
            </a>
        </span>
        <span class="dash"></span>
        <span>Düsseldorf, Germany</span>
    </section>

    <!-- SUMMARY-->

    <section id="summary">
        <h2>Summary</h2>
        <p>
            TypeScript expert and Software Engineer with a proven track record of optimizing legacy systems and building scalable web applications. Respected Tech Lead and Mentor who drives team excellence. Uniquely combines technical expertise with sociology background to foster continuous improvement in development culture and team dynamics.
        </p>
    </section>

    <!-- EXPERIENCE-->

    <section id="experience">
        <h2>Experience</h2>

        <div class="job entry">
            <h3>
                <span>Web Developer</span>
                <span class="dash"></span>
                <span>iq digital media marketing gmbh</span>
            </h3>
            <h4>
                <span>Jan 2024 - Present</span>
                <span class="dash"></span>
                <span>Düsseldorf, Germany</span>
            </h4>

            <ul>
                <li>
                    Introduced and promoted TypeScript to enhance code quality and decrease error occurrences.
                </li>
                <li>
                    Created a <strong>template builder</strong>, saving <strong>30%</strong> of development time and optimizing workflow.
                </li>
                <li>
                    Implemented the <strong>'skyMover'</strong> system to enhance ad placement reliability and remove <strong>4,000 lines</strong> of code.
                </li>
                <li>
                    Developed an ad controller to facilitate CI/CD processes and decrease dependence on third-party systems.
                </li>
                <li>
                    Developed a Chrome extension that helps clients and product managers to quickly see health metrics of their websites.
                </li>
                <li>
                    Technologies: <strong>React, TypeScript, Tailwind, Vite, AWS, Github Actions</strong>
                </li>
            </ul>

        </div>

        <div class="job entry">
            <h3>
                <span>Full Stack Developer</span>
                <span class="dash"></span>
                <span>Qanuk GmbH</span>
            </h3>
            <h4>
                <span>April 2021 - December 2023</span>
                <span class="dash"></span>
                <span>Osnabrück, Niedersachsen, Germany</span>
            </h4>

            <ul>

                <li>
                    Developed a scalable and dynamic search UI that connected 3rd party APIs and scraped articles using Elastic.
                </li>
                <li>
                    Created a geolocation-based search UI for medical practitioners by developing custom WordPress plugins.
                </li>
                <li>
                    Oversaw the creation of a WordPress plugin to streamline invoice management and event-related tasks.
                </li>
                <li>
                    Integrated <strong>AJAX, jQuery, and REST APIs</strong> to enhance interactivity and performance.
                </li>
                <li>
                    Provided mentorship and fostered collaborative development practices, increasing productivity.
                </li>
                <li>
                    Technologies: <strong>PHP, WordPress, JavaScript, jQuery, AJAX, React, Docker</strong>
                </li>
            </ul>

        </div>
    </section>

    <!-- SKILLS -->

    <section>
        <h2>Skills</h2>
        <ul>
            <li>
                <strong>Languages:</strong> TypeScript/Javascript, PHP, Golang, Java, CSS, HTML
            </li>
            <li>
                <strong>Frameworks:</strong> React, Tailwind, Next, Vite, Webpack
            </li>
            <li>
                <strong>Tools/Platforms:</strong> Git, Docker, Github (Actions), AWS
            </li>
            <li>
                <strong>Methodologies:</strong> Agile, Pair/Ensemble Programming, TDD/BDD
            </li>
        </ul>

    </section>

    <!-- EDUCATION -->

    <section>

        <h2>Education</h2>

        <div class="education entry">
            <h3>
                <span>Master of Arts in Sociology</span>
                <span class="dash"></span>
                <span>Universität Bielefeld</span>

            </h3>
            <h4>
                <span>September 2021</span>
                <span class="dash"></span>
                <span>Bielefeld, NRW, Germany</span>
            </h4>
            <p>Specialization: Qualitative Studies and Workplace Studies/Ethnomethodology</p>
        </div>


    </section>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/html/end.php";

?>