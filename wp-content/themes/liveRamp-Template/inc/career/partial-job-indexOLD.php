<section class="block block-text-dk">
    <div class="open-positions" ng-app="greenHouseApp">
        <div  ng-controller="DepartmentsCtrl">

            <div class="open-positions-by-department display-{{ department.jobs.length }}" ng-repeat="department in departments">
                <h2>{{department.name}}</h2>
                <ul>
                    <li ng-repeat="job in department.jobs"><a href="/jobs/?gh_jid={{job.id}}" class="transition">{{ job.title }}</a></li>
                </ul>
            </div>
        </div>

    </div>
</section>