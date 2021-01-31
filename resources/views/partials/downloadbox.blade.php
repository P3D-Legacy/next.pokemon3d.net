

<div class="col-12 row p-3 ">
    <h2 class="col-12  text-center">Download current version</h2>
    <table class="col-12">
        <tr>
            <th class="col-6">Version:</th>
            <td class="col-6 text-right">
                {{(new \App\CustHelpers\GitHubHelper())->getVersionTitle()}}
            </td>
        </tr>

        <tr>
            <th class="col-6">Release date:</th>
            <td class="col-6 text-right">
                {{(new \App\CustHelpers\GitHubHelper())->getReleaseDate()}}
            </td>
        </tr>

        <tr>
            <th class="col-6">Author:</th>
            <td class="col-6 text-right"><img class="img-fluid github-avatar" src="{{(new \App\CustHelpers\GitHubHelper())->getAuthorAvatar()}}"> <a href="{{(new \App\CustHelpers\GitHubHelper())->getAuthorUrl()}}">{{(new \App\CustHelpers\GitHubHelper())->getAuthorName()}}</a></td>
        </tr>
    </table>

    <a class="btn btn-success btn-lg mt-2 col-12" href="{{(new \App\CustHelpers\GitHubHelper())->getDlUrl()}}">
        <span class="fa fa-download"></span> Download Game
    </a>
</div>
