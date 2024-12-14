import QuestionItem from '@/Components/QuestionItem';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { PaginatedData, Question } from '@/types';
import { Head } from '@inertiajs/react';

export default function Index({questions}: {questions: PaginatedData<Question>}) {
    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    Questions
                </h2>
            }
        >
            <Head title="Questions" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {questions.data.map(question => (
                        <QuestionItem question={question} />  
                    ))}
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
