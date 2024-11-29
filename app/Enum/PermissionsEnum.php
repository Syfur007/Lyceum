<?php

namespace App\Enum;

enum PermissionsEnum: string
{
    case ManageUsers = 'manage_users';
    
    case AskQuestions = 'ask_questions';
    case ManageQuestions = 'manage_questions';
    case ManageAnswers = 'manage_answers';
    case UpvoteDownvote = 'upvote_downvote';

}
