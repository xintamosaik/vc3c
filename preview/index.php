<?php
$title = "Ulf Dellbrügge - Software Engineer";
include $_SERVER['DOCUMENT_ROOT'] . "/html/start.php";

/**
 * mock data
 */

$position = "Software Engineer";

$linkedin = "https://www.linkedin.com/in/ulf-dellbr%C3%BCgge-95174918a/";
$email = "ulfdellbruegge@gmail.com";
$github = "github.com/xintamosaik";
$skills = [
    "Languages" => "TypeScript/Javascript, PHP, Golang, Java, CSS, HTML",
    "Frameworks" => "React, Tailwind, Next, Vite, Webpack",
    "Tools/Platforms" => "Git, Docker, Github (Actions), AWS",
    "Methodologies" => "Agile, Pair/Ensemble Programming, TDD/BDD"
];

/**
 * real data
 * 
 * summary - data/summary.json
 * personal - data/personal.json
 * contact - data/contact.json
 * jobs - data/jobs/*.json
 * education - data/education/*.json
 * skills - data/skills.json
 */
$summary_json = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/data/summary.json');
$summary_data = json_decode($summary_json, true);
$summary = $summary_data['summary'] ?? '';

$personal_json = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/data/personal.json');
$personal_data = json_decode($personal_json, true);
$full_name = $personal_data['name'] ?? '';
$location = $personal_data['location'] ?? '';

?>
<a href="/">editor</a>
<div id="preview-content">
    <!-- This is where the content will be rendered -->
    <section id="title">
        <h1>
            <span>
                <strong><?php echo $full_name; ?></strong>
            </span>
            <span class="dash"></span>
            <span>
                <strong><?php echo $position; ?></strong>
            </span>
        </h1>
    </section>

    <section id="contact">
        <span>
            <a href="<?php echo $linkedin; ?>" target="_blank">
                LinkedIn
            </a>
        </span>
        <span class="dash"></span>
        <span>
            <a href="mailto:<?php echo $email; ?>" target="_blank">
                <?php echo $email; ?>
            </a>
        </span>
        <span class="dash"></span>
        <span>
            <a href="https://<?php echo $github ?>" target="_blank">
                <?php echo $github; ?>
            </a>
        </span>
        <span class="dash"></span>
        <span>
            <?php echo $location; ?>
        </span>
    </section>

    <!-- SUMMARY-->

    <section id="summary">
        <h2>Summary</h2>
        <p>
            <?php echo $summary; ?>
        </p>
    </section>

    <!-- EXPERIENCE-->

    <section id="experience">
        <h2>Experience</h2>

        <?php
        $job_files = glob($_SERVER['DOCUMENT_ROOT'] . '/data/jobs/*.json');
        foreach ($job_files as $file) {
            $job_json = file_get_contents($file);
            $job_data = json_decode($job_json, true);

            $job_title = $job_data['position'] ?? '';
            $company = $job_data['company'] ?? '';
            $start_date = $job_data['start'] ?? '';
            $end_date = $job_data['end'] ?? '';
            $location = $job_data['location'] ?? '';
            $description_data = $job_data['description'] ?? '';
            $description_broken = nl2br(htmlspecialchars($description_data));
            $description_array = explode("\n", $description_broken);

            $description = '';
            foreach ($description_array as $line) {
                if (trim($line) === '') {
                    continue; // Skip empty lines
                }
                $description .= "<li>$line</li>";
            }

            echo <<<HTML
                <div class="job entry">
                    <h3>
                        <span>$job_title</span>
                        <span class="dash"></span>
                        <span>$company</span>
                    </h3>
                    <h4>
                        <span>$start_date - $end_date</span>
                        <span class="dash"></span>
                        <span>$location</span>
                    </h4>

                    <ul>
                    
                            $description
                    
                    </ul>
                </div>
            HTML;
        }
        ?>
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