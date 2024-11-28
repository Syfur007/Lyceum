<?php

namespace App\Enum;

enum PermissionsEnum: string
{
    case ManageFeatures = 'manage_features';
    case ManageUsers = 'manage_users';

    case AskQuestions = 'ask_question';
    case ManageAnswers = 'manage_answers';
    case UpvoteDownvote = 'upvote_downvote';

}
