protected $fillable = [
    'subject_code',
    'subject_name',
    'subject_time',
    'subject_room',
    'subject_block',
    'subject_day',
    'year_level',
];
public function selectedBy()
{
    return $this->hasMany(SelectedSubject::class);
}
